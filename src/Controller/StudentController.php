<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/liststudent", name="liststudent")
     */
    public function liststudent()
    {
        $student=$this->getDoctrine()->getRepository(Student::class)->findAll();
        return $this->render("student/list.html.twig",array("tabStudent"=>$student));

    }

    /**
     * @Route("/deletestudent/{nce}", name="studentdelete")
     */


    public function deletestudent($nce)
    {
        $student=$this->getDoctrine()->getRepository(Student::class)->find($nce);
        $em=$this->getDoctrine()->getManager();
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute("liststudent");
    }
}
