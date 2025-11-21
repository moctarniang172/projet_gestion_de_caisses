<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Vente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            max-width: 600px;
            margin-top: 50px;
        }
        h2 {
            color: #007bff;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter une Vente</h2>
        <form action="/controllers/vente.php" method="POST">
            <!-- Nom du client -->
            <div class="mb-3">
                <label for="nom_client" class="form-label">Nom du Client</label>
                <input type="text" class="form-control" id="nom_client" name="nom_client" required>
            </div>

            <!-- Choix du poisson -->
            <div class="mb-3">
                <label for="poisson" class="form-label">Poisson</label>
                <select class="form-select" id="poisson" name="poisson" required>
                    <option value="" disabled selected>Choisir un poisson</option>
                    <option value="Tilapia">Tilapia</option>
                    <option value="Maquereau">Maquereau</option>
                    <option value="Sardine">Sardine</option>
                    <option value="Thon">Thon</option>
                </select>
            </div>

            <!-- Poids -->
            <div class="mb-3">
                <label for="poids" class="form-label">Poids (kg)</label>
                <input type="number" step="0.01" min="0" class="form-control" id="poids" name="poids" required>
            </div>

            <!-- Prix unitaire -->
            <div class="mb-3">
                <label for="prix_unitaire" class="form-label">Prix Unitaire (par kg)</label>
                <input type="number" step="0.01" min="0" class="form-control" id="prix_unitaire" name="prix_unitaire" required>
            </div>

            <!-- Total calculé automatiquement -->
            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" step="0.01" min="0" class="form-control" id="total" name="total" readonly required>
            </div>

            <!-- Avance -->
            <div class="mb-3">
                <label for="avance" class="form-label">Avance Payée</label>
                <input type="number" step="0.01" min="0" class="form-control" id="avance" name="avance" required>
            </div>

            <!-- Reste calculé automatiquement -->
            <div class="mb-3">
                <label for="reste" class="form-label">Restant</label>
                <input type="number" step="0.01" min="0" class="form-control" id="reste" name="reste" readonly required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Enregistrer la Vente</button>
        </form>
    </div>

    <!-- JS pour calcul automatique total et reste -->
    <script>
        const poids = document.getElementById('poids');
        const prix = document.getElementById('prix_unitaire');
        const avance = document.getElementById('avance');
        const total = document.getElementById('total');
        const reste = document.getElementById('reste');

        function calculer() {
            let t = parseFloat(poids.value || 0) * parseFloat(prix.value || 0);
            total.value = t.toFixed(2);
            let r = t - parseFloat(avance.value || 0);
            reste.value = r > 0 ? r.toFixed(2) : 0;
        }

        poids.addEventListener('input', calculer);
        prix.addEventListener('input', calculer);
        avance.addEventListener('input', calculer);
    </script>
</body>
</html>
