```php
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mata Kuliah</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f6f9;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-bottom: 25px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #263b5e;
            color: white;
        }

        .mengulang {
            background-color: #ffcccc;
            color: #b30000;
        }

        .ringkasan {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<?php

$matkul = [
    [
        "nama" => "Algoritma",
        "sks" => 3,
        "nilai" => 85
    ],
    [
        "nama" => "Basis Data",
        "sks" => 3,
        "nilai" => 75
    ],
    [
        "nama" => "Pemrograman Web",
        "sks" => 3,
        "nilai" => 65
    ],
    [
        "nama" => "Sistem Operasi",
        "sks" => 2,
        "nilai" => 45
    ],
    [
        "nama" => "Jaringan Komputer",
        "sks" => 3,
        "nilai" => 90
    ]
];

// Fungsi untuk menentukan grade dan bobot
function hitungBobot($nilai) {
    if ($nilai >= 80) {
        $huruf = "A";
        $bobot = 4.0;
    } elseif ($nilai >= 70) {
        $huruf = "B";
        $bobot = 3.0;
    } elseif ($nilai >= 60) {
        $huruf = "C";
        $bobot = 2.0;
    } elseif ($nilai >= 50) {
        $huruf = "D";
        $bobot = 1.0;
    } else {
        $huruf = "E";
        $bobot = 0.0;
    }

    return [
        "Grade" => $huruf,
        "Bobot" => $bobot
    ];
}

$totalSks = 0;
$totalNilai = 0;

?>

<h1>Daftar Nilai Mata Kuliah</h1>

<table>
    <tr>
        <th>No.</th>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Nilai Angka</th>
        <th>Grade</th>
        <th>Bobot</th>
        <th>Status</th>
    </tr>

    <?php foreach ($matkul as $index => $item): ?>

        <?php
        $hasil = hitungBobot($item["nilai"]);

        $grade = $hasil["Grade"];
        $bobot = $hasil["Bobot"];

        $status = ($bobot < 2.0) ? "MENGULANG" : "LULUS";

        $kelas = ($status == "MENGULANG") ? "mengulang" : "";

        $totalSks += $item["sks"];
        $totalNilai += $item["sks"] * $bobot;
        ?>

        <tr class="<?= $kelas ?>">
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($item["nama"]) ?></td>
            <td><?= $item["sks"] ?></td>
            <td><?= $item["nilai"] ?></td>
            <td><?= $grade ?></td>
            <td><?= number_format($bobot, 1) ?></td>
            <td><?= $status ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<?php
$ips = ($totalSks > 0) ? $totalNilai / $totalSks : 0;

$batasSks = ($ips >= 3.00) ? 24 : 20;
?>

<div class="ringkasan">
    <h2>Ringkasan Akademik</h2>

    <p>
        <strong>Total SKS:</strong>
        <?= $totalSks ?> SKS
    </p>

    <p>
        <strong>Total Bobot Nilai:</strong>
        <?= number_format($totalNilai, 2) ?>
    </p>

    <p>
        <strong>IPS:</strong>
        <?= number_format($ips, 2) ?>
    </p>

    <p>
        <strong>Batas Maksimal SKS Semester Depan:</strong>
        <?= $batasSks ?> SKS
    </p>
</div>

</body>
</html>
```