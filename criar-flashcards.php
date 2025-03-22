<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Flashcards</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2A2F4F;
            --secondary: #917FB3;
            --background: #FDE2F3;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        nav {
            display: flex;
            justify-content: space-between;
            margin-bottom: 2rem;
        }

        .nav-button {
            padding: 0.8rem 1.5rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .nav-button:hover {
            transform: translateY(-2px);
        }

        .card-creator {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary);
            font-weight: 600;
        }

        textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            resize: vertical;
            min-height: 100px;
            font-family: inherit;
        }

        button {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s;
        }

        button:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="container">
        <nav>
            <h1>📚 Criar Flashcards</h1>
            <a href="visualizar-flashcards.php" class="nav-button">Revisar Flashcards</a>
        </nav>

        <div class="card-creator">
            <form method="POST">
                <div class="form-group">
                    <label for="pergunta">Pergunta:</label>
                    <textarea id="pergunta" name="pergunta" placeholder="Digite sua pergunta..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="resposta">Resposta:</label>
                    <textarea id="resposta" name="resposta" placeholder="Digite a resposta..." required></textarea>
                </div>
                <button type="submit" name="salvar">Salvar Flashcard</button>
            </form>
        </div>
    </div>

    <?php
    // Configuração do banco de dados
    $host = "localhost";
    $dbname = "flashcards_db";
    $user = "root";  // Altere se necessário
    $pass = "";  // Altere se necessário

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
            $pergunta = $_POST['pergunta'] ?? '';
            $resposta = $_POST['resposta'] ?? '';

            if (!empty($pergunta) && !empty($resposta)) {
                $stmt = $pdo->prepare("INSERT INTO flashcards (pergunta, resposta) VALUES (:pergunta, :resposta)");
                $stmt->execute(['pergunta' => $pergunta, 'resposta' => $resposta]);
                echo "<script>alert('Flashcard salvo com sucesso!'); window.location.href='criar-flashcards.php';</script>";
            } else {
                echo "<script>alert('Preencha todos os campos!');</script>";
            }
        }
    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
    ?>

</body>
</html>
