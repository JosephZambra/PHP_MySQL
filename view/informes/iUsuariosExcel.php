<?php
require 'C:\xampp\htdocs\www\PHP_MySQL\vendor\autoload.php';
session_start();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$excel = new Spreadsheet();

$excel->getProperties()->setCreator('Marlom Zambrano')->setTitle('Usuarios');

$excel->setActiveSheetIndex(0);

$HojaActiva = $excel->getActiveSheet();

require_once('../../controlador/usuarioController.php');
$respuesta = new usuarioController();
$res = $respuesta->lista($_SESSION['documento_per']);

$HojaActiva->setCellValue('A1','Documneto');
$HojaActiva->setCellValue('B1','Nombre');
$HojaActiva->setCellValue('C1','Apellido');
$HojaActiva->setCellValue('D1','Fecha Nacimiento');
$HojaActiva->setCellValue('E1','Correo');
$HojaActiva->setCellValue('F1','Telefono');
$HojaActiva->setCellValue('G1','Estado');

$fila = 2;
foreach($res as $usuario):
    $HojaActiva->getColumnDimension('A')->setWidth(15);
    $HojaActiva->setCellValue('A'.$fila, $usuario->documento_per);
    $HojaActiva->getColumnDimension('B')->setWidth(25);
    $HojaActiva->setCellValue('B'.$fila, $usuario->nombre_per);
    $HojaActiva->getColumnDimension('C')->setWidth(25);
    $HojaActiva->setCellValue('C'.$fila, $usuario->apellido_per);
    $HojaActiva->getColumnDimension('D')->setWidth(15);
    $HojaActiva->setCellValue('D'.$fila, $usuario->fechanacimiento);
    $HojaActiva->getColumnDimension('E')->setWidth(30);
    $HojaActiva->setCellValue('E'.$fila, $usuario->email_per);
    $HojaActiva->getColumnDimension('F')->setWidth(15);
    $HojaActiva->setCellValue('F'.$fila, $usuario->telefono_per);
    $HojaActiva->getColumnDimension('G')->setWidth(15);
    $HojaActiva->setCellValue('G'.$fila, $usuario->estado_per);
    $fila++;
endforeach;

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Informe_Usuarios.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;