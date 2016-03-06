<?php

namespace AGIL\HallBundle\Controller;

use AGIL\HallBundle\Entity\AgilEvent;
use AGIL\HallBundle\Form\EditEventType;
use AGIL\HallBundle\Form\AddEventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\VarDumper\VarDumper;

class EventController extends Controller
{
    public function adminEventsAction() {
        $em = $this->getDoctrine()->getManager();
        $eventRepo = $em->getRepository('AGILHallBundle:AgilEvent');

    }

    public function adminEventViewAction($idEvent) {
        $em = $this->getDoctrine()->getManager();
        $eventRepo = $em->getRepository('AGILHallBundle:AgilEvent');

    }

    public function adminEventAddAction(Request $request) {
        $event = new AgilEvent();

        $form = $this->createForm(new AddEventType(), $event);

        $form->handleRequest($request);

        if($form->isValid()) {
            $event->setUser($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            $this->addFlash('success', 'Evénement ajouté');
            return $this->redirect($this->generateUrl('agil_hall_event', array('idEvent' => $event->getEventId())));
        }

        return $this->render('AGILHallBundle:Event:admin_event_add.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function adminEventEditAction ($idEvent, Request $request) {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('AGILHallBundle:AgilEvent')->find($idEvent);

        if (null === $event) {
            throw new NotFoundHttpException("L'evénement d'id " . $idEvent . " n'existe pas.");
        }

        $form = $this->createForm(new EditEventType(), $event);

        // Remplissage des champs qui ont une valeur
        $form->get('eventTitle')->setData($event->getEventTitle());
        $form->get('eventText')->setData($event->getEventText());
        $form->get('eventDate')->setData($event->getEventDate());
        $form->get('eventDateEnd')->setData($event->getEventDate());
        $form->handleRequest($request);

        if($form->isValid()) {
            $em->flush();

            $this->addFlash('success', "L'évenement a été modifié");

            return $this->redirect($this->generateUrl('agil_hall_event', array('idEvent' => $event->getEventId())));
        }

        return $this->render('AGILHallBundle:Event:admin_event_edit.html.twig', array(
            'event' => $event,
            'form'  => $form->createView()
        ));

        return $this->render('AGILHallBundle:Event:admin_event_edit.html.twig');
    }

    public function adminEventDeleteAction ($idEvent) {

        return $this->redirect($this->generateUrl('AGILHallBundle:Event:admin_event.html.twig'));
    }
}
