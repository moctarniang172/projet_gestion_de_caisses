<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Vente</title>
    <link rel="stylesheet" href="/assets/styles.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Couleur douce */
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Ajouter une Vente</h2>
        <form action="/controllers/vente.php" method="POST">
            <div class="mb-3">
                <label for="nom_client" class="form-label">Nom du Client</label>
                <input type="text" class="form-control" id="nom_client" name="nom_client" required>
            </div>
            <div class="mb-3">
                <label for="poisson" class="form-label">Poisson</label>
                <select class="form-select" id="poisson" name="poisson" required>
                    <option value="" disabled selected>Choisir un poisson</option>
                     <option value="Tilapia">Tilapia</option>
                    <option value="Maquereau">Maquereau</option>
                    <option value="Sardine">Sardine</option>
                    <option value="Thon">Thon</option>
            </div>
            <div class="mb-3">
                <label for="poids" class="form-label">Poids (kg)</label>
                <input type="number" step="0.01" class="form-control" id="poids" name="poids" required>
            </div>
            
            <div class="mb-3">
                <label for="prix_unitaire" class="form-label">Prix Unitaire (par kg)</label>
                <input type="number" step="0.01" class="form-control" id="prix_unitaire" name="prix_unitaire" required>
            </div>
             <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" required>
            </div>

            <div class="mb-3">
                <label for="avance" class="form-label">Avance Payée</label>
                <input type="number" step="0.01" class="form-control" id="avance" name="avance" required>
            </div>
            <div class="mb-3">
                <label for="reste" class="form-label">Restant</label>
                <input type="number" step="0.01" class="form-control" id="reste" name="reste" required>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer la Vente</button>
        </form>
    </div>
</body>
</html>