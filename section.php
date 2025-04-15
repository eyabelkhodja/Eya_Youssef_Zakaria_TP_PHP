<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=student_db', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require_once 'tableClasses.php';

$activeSectionId = null;
$studentsBySection = [];
$sections = [];

// ✅ Handle view_students POST action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['view_students'], $_POST['section_id'])) {
    $activeSectionId = $_POST['section_id'];
    $stmt = $pdo->prepare("SELECT * FROM etudiant WHERE section = ?");
    $stmt->execute([$activeSectionId]);
    $studentsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($studentsData as $student) {
        $studentsBySection[] = new Etudiant(
            $student['id'],
            $student['name'],
            $student['birthday'],
            $student['image'],
            $student['section']
        );
    }
}

// ✅ Load all sections
$statement = $pdo->query("SELECT * FROM section");
$sectionsData = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($sectionsData as $sectionData) {
    $sections[] = new Section(
        $sectionData['id'],
        $sectionData['designation'],
        $sectionData['description']
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="styleTpPHP.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
</head>
<body>
    <div class="tab-bar">
        <label id="sms">Students Management System</label>
        <div class="tabs">
            <a href="homePage.php">Home</a>
            <a href="students.php">Students</a>
            <a href="sections.php" class="active">Sections</a>
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
                    <th>Designation</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($sections as $section): ?>
                <tr>
                    <td><?= htmlspecialchars($section->getId()) ?></td>
                    <td><?= htmlspecialchars($section->getDesignation()) ?></td>
                    <td><?= htmlspecialchars($section->getDescription()) ?></td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="section_id" value="<?= $section->getId() ?>">
                            <button type="submit" name="view_students" class="btn btn-info btn-sm">View Students</button>
                        </form>
                    </td>
                </tr>

                <?php if ($activeSectionId == $section->getId()): ?>
                    <tr class="student-display-row">
                        <td colspan="4">
                            <strong>Students in Section <?= htmlspecialchars($section->getDesignation()) ?>:</strong>
                            <?php if (!empty($studentsBySection)): ?>
                                <ul>
                                    <?php foreach ($studentsBySection as $student): ?>
                                        <li><?= htmlspecialchars($student->getName()) ?> (ID: <?= htmlspecialchars($student->getId()) ?>)</li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No students found in this section.</p>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#studentsTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'copy', text: 'Copy', className: 'btn btn-primary' },
                    { extend: 'csv', text: 'CSV', className: 'btn btn-secondary' },
                    { extend: 'excel', text: 'Excel', className: 'btn btn-success' },
                    { extend: 'pdf', text: 'PDF', className: 'btn btn-danger' }
                ]
            });
        });
    </script>
</body>
</html>
