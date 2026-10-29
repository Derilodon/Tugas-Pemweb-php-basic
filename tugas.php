<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Jarkom</title>
</head>
<body>
    <?php
    $matkul = [
        [
            "nama" => "algoritma",
            "sks" => 3,
            "nilai" => 85
        ],

        [
            "nama" => "basis data",
            "sks" => 3,
            "nilai" => 75
        ],

        [
            "nama" =>"peograman web" ,
            "sks" => 3,
            "nilai" => 65 
        ],

        [
            "nama" => "sistem operasi",
            "sks" => 2,
            "nilai" => 45 
        ],

        [
            "nama" => "jaringan komputer",
            "sks" => 3,
            "nilai" => 90 
        ]
    ];

    function hitungBobot($nilai) {

        if ($nilai >= 80) {
            $huruf = "A";
            $bobot = 4.0;
        }

        elseif ($nilai >= 70) {
            $huruf = "B";
            $bobot = 3.0;
        }

        elseif ($nilai >= 60) {
            $huruf = "C";
            $bobot = 2.0;
        }

        elseif ($nilai >= 50) {
            $huruf = "D";
            $bobot = 1.0;
        }

        else {
            $huruf = "E";
            $bobot = 0.0;
        }

        return [
            "Grade" => $huruf,
            "Bobot" => $bobot
        ];
    
        echo "Grade = " .$huruf;
    }
</body>
</html>