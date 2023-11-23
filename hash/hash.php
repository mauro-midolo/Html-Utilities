<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assicurati di validare e sanificare gli input in un'applicazione reale
    $algorithm = $_POST['algorithm'] ?? 'md5'; // Default a MD5 se non specificato
    $message = $_POST['message'] ?? '';

    // Controlla se l'algoritmo specificato è supportato
    if (in_array($algorithm, hash_algos())) {
        $hash = hash($algorithm, $message);
        echo json_encode(['success' => true, 'hash' => $hash]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Algoritmo non supportato']);
    }
} else {
    // Gestisci il caso in cui il metodo non sia POST
    echo json_encode(['success' => false, 'error' => 'Metodo non consentito']);
}
?>
