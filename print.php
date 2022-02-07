<?php
require 'vendor/autoload.php';

require "functions.php";
$model = query("SELECT * FROM model");

$html = '<h1>Data Model</h1>
<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>ID</th>
				<th>Gambar</th>
				<th>Nama</th>
				<th>Umur</th>
				<th>Kelamin</th>
				<th>Kontak</th>
			</tr>';
foreach ($model as $row){
$html .= '<tr>
			<td>' .  $row["id"]  . '</td>
			<td><img src="img/' . $row["image"] . '" alt=" ' . $row["image"] . ' " width="100"></td>
			<td> ' . $row["nama"] . ' </td>
			<td> ' . $row["umur"] . ' </td>
			<td> ' . $row["kelamin"] . ' </td>
			<td> ' . $row["kontak"] . ' </td>
		</tr>';	
}

$html .= '</table>';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("data_model.pdf", array("Attachment" => false));

?>