<?php

define('FPDF_FONTPATH', 'font/');
require('fpdf.php');

/**
 * Description of santos_helper
 *
 * @author santos sabanari
 */
Class Santos_report extends FPDF {

    // Current column
    var $col = 0;
    // Ordinate of column start
    var $y0;
    
    function Santos_report($orientation='P', $unit='mm', $size='A4'){
        $this->FPDF($orientation, $unit, $size);
    }
    
    function Footer() {
        // Page footer
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128);
        $this->Cell(0, 10, 'Page ' . $this->PageNo().'/{nb}', 0, 0, 'C');
    }

    function SetCol($col) {
        // Set position at a given column
        $this->col = $col;
        $x = 10 + $col * 65;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak() {
        // Method accepting or not automatic page break
        if ($this->col < 2) {
            // Go to next column
            $this->SetCol($this->col + 1);
            // Set ordinate to top
            $this->SetY($this->y0);
            // Keep on page
            return false;
        } else {
            // Go back to first column
            $this->SetCol(0);
            // Page break
            return true;
        }
    }
    
    function setJudul($judul) {
        $this->SetFont('Arial', 'BU', 16);
        $this->Cell(0, 9, $judul, 0, 1, 'C');
        $this->Ln(10);
        $this->y0 = $this->GetY();
        $this->SetFont('', '', 12);
    }
    
    function setTabel($header, $data, $lebar) {
        // Colors, line width and bold font
        $this->SetFillColor(0, 0, 255);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.5);
        $this->SetFont('', 'B');
        // Header
        for ($i = 0; $i < count($header); $i++)
            $this->Cell($lebar[$i], 7, $header[$i], 1, 0, 'C', true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach ($data as $row) {
            $kolom=0;
            foreach($row as $column){
                $this->Cell($lebar[$kolom], 6, $column, 'LR', 0, 'L', $fill);
                $kolom++;
            }
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($lebar), 0, '', 'T');
    }

}

?>