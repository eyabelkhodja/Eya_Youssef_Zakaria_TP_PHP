<?php
session_start();
require 'database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="styleTpPHP.css">
</head>
<body>
    <div class="tab-bar">
        <label id="sms">Students Management System</label>
        <div class="tabs">
        <a href="homePage.php">Home</a>
        <a href="students.php" class="active">Students</a>
        <a href="sections.php">Sections</a>
        <a href="loginPage.php">Logout</a>
        </div>
    </div>
    <div class="container mt-5">
        <h1 class="mb-4">Students Database</h1>

        <h2 class="mb-4">Here are the students in our database:</h2>
        <table class="table table-striped table-bordered" id="studentsTable">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Section</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
            <?php
            require_once 'tableClasses.php';

            $statement = $pdo->query("SELECT * FROM etudiant");
            $studentsData = $statement->fetchAll(PDO::FETCH_ASSOC);

            $etudiants = [];
            foreach ($studentsData as $studentdata) {
                $etudiant = new etudiant($studentdata['id'], $studentdata['name'], $studentdata['birthday'], NULL, $studentdata['section']);
                $etudiants[] = $etudiant;
            }

            foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?= htmlspecialchars($etudiant->getId()) ?></td>
                    <td><?= htmlspecialchars($etudiant->getName()) ?></td>
                    <td><?= htmlspecialchars($etudiant->getBirthday()) ?></td>
                    <td><?= htmlspecialchars($etudiant->getSection()) ?></td>
                    <td class="text-center">
                        <form action="detailEtudiant.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($etudiant->getId()) ?>">
                            <button type="submit" class="btn btn-info btn-sm">🛈 Details</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <form action="addStudent.php" method="POST" class="mt-4">
            <p>If you wish to add a student, click on the button below:</p>
            <button type="submit" class="btn btn-primary">➕ Add Student</button>
        </form>
    </div>

    <!-- Include Bootstrap and DataTables JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- Include DataTables Buttons CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
        var table = $('#studentsTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
            {
                extend: 'copy',
                text: 'Copy',
                className: 'btn btn-primary'
            },
            {
                extend: 'csv',
                text: 'CSV',
                className: 'btn btn-secondary'
            },
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-danger'
            }
            ]
        });
        });
    </script>
