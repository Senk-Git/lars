<?php
session_start();
require_once 'config.php'; 

// === Verificación de Autenticación ===
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

try {
    // CONEXIÓN A LA BASE DE DATOS
    $pdo = conectarBaseDeDatos(); 
    $user_id = $_SESSION['user_id'];
    
    // *AQUÍ DEBERÍAS RECUPERAR LOS DATOS REALES DEL ALUMNO DESDE LA BASE DE DATOS*
    // Simulación de datos
    $nombre_alumno = "Elena Ramírez";
    $grado_grupo = "3° B";
    $promedio_general = "9.2";
    $parcial_actual = "3°";
    $materias_inscritas = 6;
    
    // --- OBTENCIÓN DE RECORDATORIOS (DINÁMICA) ---
    $sql_recordatorios = "SELECT titulo, fecha_vencimiento FROM recordatorios 
                          WHERE user_id = :user_id AND fecha_vencimiento >= CURDATE()
                          ORDER BY fecha_vencimiento ASC 
                          LIMIT 5";
                          
    $stmt = $pdo->prepare($sql_recordatorios);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $recordatorios_alumno = $stmt->fetchAll();

} catch (\Exception $e) {
    // Si la base de datos o la conexión falla, forzamos la salida al login 
    // para evitar que el usuario interactúe con datos incorrectos.
    header("Location: index.php?error=db_fail");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <title>Dashboard Alumno</title>

    <?php include "css/stylesDash.php"; // Asumo que el CSS se mantiene igual o similar ?>
</head>

<body>

    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="img/lars_limpio.png" alt="">
                    <h2>LA<span class="primary">RS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active" id="1">
                    <span class="material-symbols-outlined">space_dashboard</span>
                    <h3>Inicio</h3>
                </a>
                <a href="mis_calificaciones.php" id="2">
                    <span class="material-symbols-outlined">grade</span>
                    <h3>Calificaciones</h3>
                </a>
                <a href="#crear-recordatorio" id="3"> 
                    <span class="material-symbols-outlined">menu_book</span>
                    <h3>Recordatorios</h3>
                </a>
                <a href="horario.php" id="4">
                    <span class="material-symbols-outlined">schedule</span>
                    <h3>Horario</h3>
                </a>
                <a href="login/logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Cerrar sesión</h3>
                </a>
            </div>

        </aside>
        <main>

            <h1>Bienvenido, <?php echo htmlspecialchars($nombre_alumno); ?></h1>
            
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="alert success" style="padding: 1rem; margin-bottom: 1rem; border-radius: 0.8rem; background: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
                    <?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert danger" style="padding: 1rem; margin-bottom: 1rem; border-radius: 0.8rem; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>


            <div class="date">
                <h3 class="fecha"></h3> <h3 class="tiempo"></h3> 
            </div>

            <div class="insights">
                <div class="groups"> 
                    <span class="material-symbols-outlined">donut_large</span>
                    <div class="middle"><div class="left"><h3>PROMEDIO GENERAL</h3><h2 class="success"><?php echo htmlspecialchars($promedio_general); ?></h2></div></div>
                </div>
                <div class="students">
                    <span class="material-symbols-outlined">collections_bookmark</span>
                    <div class="middle"><div class="left"><h3>MATERIAS INSCRITAS</h3><h2><?php echo htmlspecialchars($materias_inscritas); ?></h2></div></div>
                </div>
                <div class="grades">
                    <span class="material-symbols-outlined">123</span>
                    <div class="middle"><div class="left"><h3>PARCIAL DE EVALUACIÓN</h3><h2><?php echo htmlspecialchars($parcial_actual); ?></h2></div></div>
                </div>
            </div>

            <div id="crear-recordatorio" class="new-reminder" style="margin-top: 2rem; padding: 1.5rem; background: var(--color-white); border-radius: var(--card-border-radius); box-shadow: var(--box-shadow);">
                <h2>Crear Nuevo Recordatorio Personal 🔔</h2>
                <form action="crear_recordatorio.php" method="POST" style="display: flex; gap: 1rem; margin-top: 1rem; flex-wrap: wrap;">
                    <input type="text" name="recordatorio_titulo" placeholder="Título del recordatorio (Ej: Examen de Inglés)" required 
                        style="padding: 10px; border: 1px solid var(--color-light); border-radius: var(--border-radius-2); flex-grow: 2; min-width: 200px;">
                    <input type="date" name="recordatorio_fecha" required 
                        style="padding: 10px; border: 1px solid var(--color-light); border-radius: var(--border-radius-2); flex-grow: 1; min-width: 120px;">
                    <button type="submit" class="btn-primary" 
                        style="padding: 10px 15px; border: none; border-radius: var(--border-radius-2); background: var(--color-primary); color: white; cursor: pointer;">
                        Guardar
                    </button>
                </form>
            </div>
            <div class="recent-grades">
                <h2>Últimas Calificaciones</h2>
                <table>...</table>
                <a href="mis_calificaciones.php">Ver todas las calificaciones</a>
            </div>


        </main>

        <div class="right">
            <div class="top">
                <button id="menu-btn"><span class="material-symbols-outlined">menu_open</span></button>
                <div class="theme-toggler">...</div>
                <div class="profile">
                    <div class="info">
                        <p>Hola!, <b><?php echo htmlspecialchars(explode(' ', $nombre_alumno)[0]); ?></b></p>
                        <small class="text-muted">Alumno de <?php echo htmlspecialchars($grado_grupo); ?></small>
                    </div>
                    <div class="profile-photo"><img src="img/perfil_alumno_default.jpg"> </div>
                </div>

            </div>
            
            <div class="recent-updates">
                <h2>Noticias Escolares y Recordatorios</h2>
                <div class="updates">
                    
                    <?php if (empty($recordatorios_alumno)): ?>
                        <div class="update"><div class="message"><p>No tienes recordatorios pendientes.</p></div></div>
                    <?php endif; ?>
                    
                    <?php foreach ($recordatorios_alumno as $recordatorio): ?>
                        <?php
                            $fecha_venc = new DateTime($recordatorio['fecha_vencimiento']);
                            $diff = $fecha_venc->diff(new DateTime());
                            $tipo_alerta = ($diff->days <= 3) ? 'danger' : 'warning';
                        ?>
                        <div class="update recordatorio">
                            <div class="profile-photo">
                                <span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--color-<?php echo $tipo_alerta; ?>);">event</span>
                            </div>
                            <div class="message">
                                <p><b>Recordatorio:</b> <?php echo htmlspecialchars($recordatorio['titulo']); ?></p>
                                <small class="text-muted">Vence: <?php echo $fecha_venc->format('d/M/Y'); ?></small>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="update">
                        <div class="profile-photo">
                            <span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--color-primary);">campaign</span>
                        </div>
                        <div class="message">
                            <p><b>Aviso</b> ¡Inscripciones a talleres de verano abiertas! Revisa el portal.</p>
                            <small class="text-muted">Hace 1 día</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <span class="material-symbols-outlined" style="font-size: 2.2rem; color: var(--color-warning);">calendar_month</span>
                        </div>
                        <div class="message">
                            <p><b>Recordatorio:</b> Entrega final del proyecto de Programación Web es el 15/10.</p>
                            <small class="text-muted">Hace 5 horas</small>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


<?php include "js/jSDashboard.php" ?>


</body>
</html>