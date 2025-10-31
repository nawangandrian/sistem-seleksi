<?php

namespace App\Libraries;

use FPDF\FPDF; // Menggunakan namespace FPDF

class CustomPDF extends FPDF
{
    public function __construct()
    {
        parent::__construct();
    }
}

