<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Dettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Liste des Dettes des Clients</h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom du Client</th>
                <th>Poisson</th>
                <th>Poids (kg)</th>
                <th>Dette (reste)</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($dettes)): ?>
                <?php foreach($dettes as $d): ?>
                <tr>
                    <td><?= htmlspecialchars($d['nom_client']) ?></td>
                    <td><?= htmlspecialchars($d['poisson']) ?></td>
                    <td><?= htmlspecialchars($d['poids']) ?></td>
                    <td><?= number_format($d['reste'], 0) ?> FCFA</td>

                    <td>
                        <a 
                            href="../views/payer_dette.php?id_vente=<?= $d['id']; ?>" 
                            class="btn btn-primary btn-sm">
                            Payer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Aucune dette trouvée.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
