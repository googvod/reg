<?php

namespace App\Controller;

use Symfony\Component\Form\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\Security;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class IndexController
 * @package App\Controller
 */
class IndexController extends FOSRestController
{
    /**
     * List the regs for search.
     *
     * This call takes simple regs list.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the rewards of an regs numbers, limit 15",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(property="id", type="number"),
     *              @SWG\Property(property="reg", type="string")
     *          )
     *     )
     *)
     *
     * @SWG\Parameter(
     *     name="term",
     *     in="query",
     *
     *     type="string",
     *     description="The reg number"
     * )
     *
     *
     * @param Request $request
     *
     * @return \FOS\RestBundle\View\View
     */
    public function search(Request $request)
    {
        $term = $request->query->get('term');

        if (!$term) {
            throw new InvalidArgumentException();
        }

        $events = $this->getDoctrine()->getRepository('App:Event')->search($term);

        return $events;
    }

    /**
     * List the results regs.
     *
     * This call takes simple regs list.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the rewards of an regs events",
     *     @Model(type=App\Entity\Event::class)
     *)
     *
     * @param $request Request
     * @param $reg     string
     *
     * @return \FOS\RestBundle\View\View
     */
    public function details(Request $request, $reg)
    {
        $eventRepository = $this->getDoctrine()->getRepository('App:Event');
        $events = $eventRepository->findByReg($reg);

        if (!$events) {
            throw new NotFoundHttpException();
        }

        return $events;
    }

    /**
     * List the results brands.
     *
     * This call takes simple brands list.
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns the rewards of brands",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(
     *              type="object",
     *              @SWG\Property(property="brand", type="string"),
     *              @SWG\Property(property="count", type="string")
     *          )
     *     )
     *)
     *
     * @return array
     */
    public function getBrands(string $type)
    {
        return $this->getDoctrine()
            ->getRepository('App:Event')
            ->getAllBrands($type);
    }

    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->getDoctrine()
            ->getRepository('App:Event')
            ->getAllTypes();
    }

    /**
     * @param string $brand
     *
     * @return array
     */
    public function getModels(string $type, string $brand)
    {
        return $this->getDoctrine()
            ->getRepository('App:Event')
            ->getAllModels($type, $brand);
    }

    /**
     * @param Request $request
     *
     * @return \Doctrine\DBAL\Driver\ResultStatement
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getDashboardData(Request $request)
    {
        return $this->container->get('dashboard.service')->getYearRangeData($request->query->all());
    }
}
