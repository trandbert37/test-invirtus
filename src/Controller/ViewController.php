<?php


namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ViewController extends AbstractController {
	/**
	 * @param int $id
	 * @Route("view/{id}")
	 *
	 * @return Response
	 */
	public function view( $id ) {
		return $this->render( 'view.html.twig', [ 'viewId' => $id ] );
	}

	/**
	 * @param SerializerInterface $serializer
	 * @param EntityManagerInterface $em
	 * @param int $viewId
	 *
	 * @return Response
	 * @Route("api/views/{viewId}/locations", name="view_locations")
	 */
	public function getLocations( SerializerInterface $serializer, EntityManagerInterface $em, $viewId ) {
		$locations = $em->getRepository( 'App:Location' )->findByView( $viewId );
		if ( ! $locations ) {
			throw new NotFoundHttpException( sprintf( 'View with id %d not found', $viewId ) );
		}

		$response = new Response( $serializer->serialize( $locations, 'json' ) );
		$response->headers->set( 'Content-Type', 'application/json' );

		return $response;
	}
}