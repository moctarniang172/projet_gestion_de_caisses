<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payer Dette</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;  
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,    0.1);
            max-width: 500px;
            margin-top: 50px;
        }
        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payer une Dette</h2>
        <form action="../controllers/dette.php" method="POST">
            <!-- ID de la vente -->
            <div class="mb-3">
                <label for="id_vente" class="form-label">ID de la Vente</label>
                <input type="number" class="form-control" id="id_vente" name="id_vente" required>
            </div>

            <!-- Montant à payer -->
            <div class="mb-3">
                <label for="montant_paye" class="form-label">Montant à Payer</label>
                <input type="number" step="0.01" min="0" class="form-control" id="montant_paye" name="montant_paye" required>
            </div>

            <button type="submit" class="btn btn-primary">Payer</button>
        </form>
    </div>  
    
</body>
</html>