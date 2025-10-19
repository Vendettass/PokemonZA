<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokédex - Légendes Pokémon Z-A</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        header h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        .search-filters {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 30px;
        }

        .search-box {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-box input {
            flex: 1;
            min-width: 250px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 25px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .filters {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-group label {
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .filter-group select {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
        }

        .filter-group select:focus {
            outline: none;
            border-color: #667eea;
        }

        .zones-container {
            display: grid;
            gap: 25px;
        }

        .zone-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .zone-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .zone-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .zone-title {
            font-size: 1.8em;
            color: #667eea;
            font-weight: bold;
        }

        .zone-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
        }

        .pokemon-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 15px;
        }

        .pokemon-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            transition: all 0.3s;
        }

        .pokemon-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .pokemon-name {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
        }

        .pokemon-level {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .pokemon-location {
            color: #555;
            font-size: 0.95em;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .pokemon-conditions {
            background: #fff3cd;
            color: #856404;
            padding: 8px;
            border-radius: 5px;
            font-size: 0.9em;
            margin-top: 8px;
            border-left: 3px solid #ffc107;
        }

        .baron-badge {
            display: inline-block;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: bold;
            margin-left: 10px;
        }

        .time-badges {
            display: flex;
            gap: 8px;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .time-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: 600;
        }

        .time-badge.day {
            background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%);
            color: white;
        }

        .time-badge.night {
            background: linear-gradient(135deg, #2c3e50 0%, #3a1c71 100%);
            color: white;
        }

        .time-badge.both {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .no-results h2 {
            color: #667eea;
            font-size: 2em;
            margin-bottom: 10px;
        }

        .no-results p {
            color: #666;
            font-size: 1.1em;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2em;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box input {
                min-width: 100%;
            }

            .pokemon-grid {
                grid-template-columns: 1fr;
            }

            .zone-header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
        }

        .stats {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin: 20px 0;
            flex-wrap: wrap;
        }

        .stat-card {
            background: white;
            padding: 15px 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #667eea;
        }

        .stat-label {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>🎮 Pokédex Légendes Z-A</h1>
            <p>Répertoire complet des zones sauvages et Pokémon</p>
        </header>

        <div class="stats" id="stats">
            <div class="stat-card">
                <div class="stat-number" id="totalZones">20</div>
                <div class="stat-label">Zones</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="totalPokemon">0</div>
                <div class="stat-label">Pokémon</div>
            </div>
        </div>

        <div class="search-filters">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="🔍 Rechercher un Pokémon ou une zone...">
            </div>
            <div class="filters">
                <div class="filter-group">
                    <label>Zone</label>
                    <select id="zoneFilter">
                        <option value="">Toutes les zones</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Affichage</label>
                    <select id="displayFilter">
                        <option value="all">Tous les Pokémon</option>
                        <option value="baron">Barons uniquement</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Moment</label>
                    <select id="timeFilter">
                        <option value="all">Jour et Nuit</option>
                        <option value="day">Jour uniquement</option>
                        <option value="night">Nuit uniquement</option>
                        <option value="both">Disponible 24h/24</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="zones-container" id="zonesContainer"></div>
    </div>

    <script>
        const zonesData = [
            {
                number: 1,
                name: "Rue Méridionale",
                pokemon: [
                    { name: "Aspicot", level: "3-4", location: "Au niveau de la rue principale / Sur les toits accessibles avec Éclate-Roc", conditions: "", time: "both" },
                    { name: "Lépidonille", level: "3-4", location: "Au niveau de la rue principale", conditions: "", time: "both" },
                    { name: "Roucool", level: "3", location: "Sur les toits accessibles avec Éclate-Roc", conditions: "", time: "day" },
                    { name: "Passerouge", level: "4", location: "Au niveau de la rue principale", conditions: "", time: "day" },
                    { name: "Sapereau", level: "3", location: "Au niveau de la rue principale", conditions: "", time: "both" },
                    { name: "Wattouat", level: "5", location: "Au niveau de la rue principale", conditions: "", time: "both" },
                    { name: "Pichu", level: "5", location: "Sur les toits accessibles avec Éclate-Roc", conditions: "Soyez discret, cachez-vous dans les hautes herbes", time: "both" },
                    { name: "Roucool", level: "-", location: "Sur les toits, partie gauche", conditions: "", baron: true, time: "day" }
                ]
            },
            {
                number: 2,
                name: "Place verte",
                pokemon: [
                    { name: "Coconfort", level: "7", location: "Dans la partie gauche du parc, caché sur un arbre", conditions: "", time: "both" },
                    { name: "Ratentif", level: "6-7", location: "Dans la partie haute droite et la partie centrale du parc", conditions: "", time: "both" },
                    { name: "Magicarpe", level: "6-7", location: "Dans l'eau", conditions: "", time: "both" },
                    { name: "Opermine", level: "6-8", location: "Dans la partie haute gauche et la partie centrale du parc", conditions: "", time: "both" },
                    { name: "Stari", level: "5-7", location: "Dans l'eau", conditions: "", time: "night" },
                    { name: "Rozbouton", level: "6", location: "Dans la partie gauche du parc", conditions: "", time: "day" },
                    { name: "Ratentif", level: "-", location: "Dans la partie centrale du parc", conditions: "", baron: true, time: "both" },
                    { name: "Magicarpe", level: "-", location: "Avec le baron Stari, dans la partie basse droite du parc", conditions: "", baron: true, time: "both" },
                    { name: "Stari", level: "-", location: "Avec le baron Magicarpe, dans la partie basse droite du parc", conditions: "", baron: true, time: "night" }
                ]
            },
            {
                number: 3,
                name: "Place Rouge",
                pokemon: [
                    { name: "Flabébé", level: "6-7", location: "Dans la partie centrale du parc", conditions: "", time: "day" },
                    { name: "Pandespiègle", level: "7", location: "Dans la partie haute gauche du parc", conditions: "", time: "both" },
                    { name: "Hélionceau", level: "7", location: "Dans la partie haute gauche du parc", conditions: "", time: "day" },
                    { name: "Cabriolaine", level: "6-8", location: "Dans la partie basse gauche du parc", conditions: "", time: "both" },
                    { name: "Psystigri", level: "7", location: "Dans la partie haute droite du parc", conditions: "Soyez discret pour le capturer", time: "both" },
                    { name: "Pikachu", level: "6-7", location: "Dans la partie basse droite du parc", conditions: "", time: "both" },
                    { name: "Hélionceau", level: "-", location: "Dans la partie centrale gauche du parc", conditions: "", baron: true, time: "day" },
                    { name: "Passerouge", level: "4", location: "En haut de l'escalier de l'édifice au centre à gauche du parc", conditions: "", time: "day" }
                ]
            },
            {
                number: 4,
                name: "Cimetière Dussomeil",
                pokemon: [
                    { name: "Fantominus", level: "8-10", location: "Un peu partout", conditions: "", time: "night" },
                    { name: "Abo", level: "8-10", location: "Un peu partout", conditions: "", time: "both" },
                    { name: "Mimigal", level: "7-8", location: "Sur les murs des tombeaux", conditions: "", time: "night" },
                    { name: "Péréglain", level: "9", location: "Dans le coin en haut à gauche", conditions: "", time: "both" },
                    { name: "Monorpale", level: "10", location: "Centre du parc", conditions: "", time: "both" },
                    { name: "Fantominus", level: "-", location: "Au niveau du centre de la zone", conditions: "", baron: true, time: "night" },
                    { name: "Mimigal", level: "-", location: "Au centre vers le bas de la zone", conditions: "", baron: true, time: "night" }
                ]
            },
            {
                number: 5,
                name: "Arrondissement de Valcyan",
                pokemon: [
                    { name: "Chétiflor", level: "11-13", location: "Avenue Cyan et dans le parc du 2e arrondissement de Valcyan", conditions: "Après la boue à enlever avec une attaque eau", time: "both" },
                    { name: "Roucool", level: "11-13", location: "Avenue Cyan sur les étals des marchands et les voitures", conditions: "Utilisez une attaque eau pour accéder aux toits en haut à gauche", time: "day" },
                    { name: "Sapereau", level: "13", location: "Dans le parc du 2e arrondissement de Valcyan", conditions: "", time: "both" },
                    { name: "Venipatte", level: "14-15", location: "Dans le parc du 2e arrondissement de Valcyan", conditions: "Utilisez une attaque eau pour accéder aux égouts", time: "both" },
                    { name: "Abra", level: "13-14", location: "Sur les toits en haut à gauche", conditions: "Soyez discret et rapide pour le capturer", time: "both" },
                    { name: "Dynavolt", level: "19", location: "Sur les toits, après avoir passé les égouts et avoir monté deux échelles", conditions: "", time: "both" },
                    { name: "Roucoups", level: "19-20", location: "Sur les toits, après avoir passé les égouts et avoir monté deux échelles", conditions: "", time: "day" },
                    { name: "Chétiflor", level: "-", location: "Avenue Cyan", conditions: "", baron: true, time: "both" },
                    { name: "Scobolide", level: "-", location: "Dans les égouts, après avoir utilisé une attaque eau", conditions: "", baron: true, time: "both" }
                ]
            },
            {
                number: 6,
                name: "Rue Septentrionale",
                pokemon: [
                    { name: "Laporeille", level: "16-18", location: "Dans la partie basse centrale", conditions: "", time: "both" },
                    { name: "Opermine", level: "20", location: "En dessous du pont, échelle derrière les étals des marchands", conditions: "", time: "both" },
                    { name: "Malosse", level: "18", location: "Au niveau des étals des marchands dans la partie centrale", conditions: "", time: "night" },
                    { name: "Magicarpe", level: "19-20", location: "Dans l'eau, sous le pont au niveau des Opermine", conditions: "", time: "both" },
                    { name: "Lainergie", level: "19-20", location: "En montant par le téléporteur sur les toits dans la partie centrale gauche", conditions: "", time: "both" },
                    { name: "Tylton", level: "18-19", location: "Sur les toits dans la partie centrale droite, prenez l'échelle après les Lainergie", conditions: "", time: "day" },
                    { name: "Méditikka", level: "-", location: "Sur le terrain de sport vers le haut de la zone", conditions: "", baron: true, time: "both" },
                    { name: "Démolosse", level: "-", location: "Au niveau des étals des marchands dans la partie centrale", conditions: "", baron: true, time: "night" },
                    { name: "Opermine", level: "-", location: "En dessous du pont dans la partie basse centrale", conditions: "", baron: true, time: "both" },
                    { name: "Pikachu", level: "-", location: "Sur le toit tout en haut à gauche, échelle derrière le terrain de sport", conditions: "", baron: true, time: "both" }
                ]
            },
            {
                number: 7,
                name: "Zone sauvage 7",
                pokemon: [
                    { name: "Hippopotas", level: "-", location: "Zone 7", conditions: "" },
                    { name: "Rosélia", level: "-", location: "Zone 7", conditions: "" },
                    { name: "Floette", level: "-", location: "Zone 7 (Rouge, Orange, Jaune, Bleue et Blanche)", conditions: "" },
                    { name: "Sorbébé", level: "-", location: "Zone 7", conditions: "" },
                    { name: "Coconfort", level: "-", location: "Zone 7", conditions: "", baron: true },
                    { name: "Nanméouïe", level: "-", location: "Zone 7", conditions: "", baron: true },
                    { name: "Polichombr", level: "-", location: "Zone 7", conditions: "", baron: true },
                    { name: "Braisillon", level: "-", location: "Zone 7", conditions: "", baron: true }
                ]
            },
            {
                number: 8,
                name: "Zone sauvage 8",
                pokemon: [
                    { name: "Machoc", level: "-", location: "Zone 8", conditions: "" },
                    { name: "Chamallot", level: "-", location: "Zone 8", conditions: "" },
                    { name: "Griknot", level: "-", location: "Zone 8", conditions: "" },
                    { name: "Rototaupe", level: "-", location: "Zone 8", conditions: "" },
                    { name: "Mascaïman", level: "-", location: "Zone 8", conditions: "" },
                    { name: "Escroco", level: "-", location: "Zone 8", conditions: "", baron: true }
                ]
            },
            {
                number: 9,
                name: "Zone sauvage 9",
                pokemon: [
                    { name: "Kadabra", level: "-", location: "Zone 9", conditions: "" },
                    { name: "Ténéfix", level: "-", location: "Zone 9", conditions: "" },
                    { name: "Mysdibule", level: "-", location: "Zone 9", conditions: "" },
                    { name: "Braisillon", level: "-", location: "Zone 9", conditions: "" },
                    { name: "Strassie", level: "-", location: "Zone 9", conditions: "" },
                    { name: "Psystigri", level: "-", location: "Zone 9", conditions: "", baron: true },
                    { name: "Mistigrix", level: "-", location: "Zone 9", conditions: "", baron: true },
                    { name: "Élecsprint", level: "-", location: "Zone 9", conditions: "", baron: true }
                ]
            },
            {
                number: 10,
                name: "Zone sauvage 10",
                pokemon: [
                    { name: "Arbok", level: "-", location: "Zone 10", conditions: "" },
                    { name: "Chétiflor", level: "-", location: "Zone 10", conditions: "" },
                    { name: "Ramoloss", level: "-", location: "Zone 10", conditions: "" },
                    { name: "Stari", level: "-", location: "Zone 10", conditions: "" },
                    { name: "Carvanha", level: "-", location: "Zone 10", conditions: "" },
                    { name: "Miradar", level: "-", location: "Zone 10", conditions: "", baron: true },
                    { name: "Anchwatt", level: "-", location: "Zone 10", conditions: "", baron: true },
                    { name: "Sharpedo", level: "-", location: "Zone 10", conditions: "", baron: true }
                ]
            },
            {
                number: 11,
                name: "Zone sauvage 11",
                pokemon: [
                    { name: "Léviator", level: "-", location: "Zone 11", conditions: "" },
                    { name: "Chétiflor", level: "-", location: "Zone 11", conditions: "" },
                    { name: "Couafarel", level: "-", location: "Zone 11", conditions: "" },
                    { name: "Sepiatop", level: "-", location: "Zone 11", conditions: "" },
                    { name: "Limonde", level: "-", location: "Zone 11", conditions: "" },
                    { name: "Flingouste", level: "-", location: "Zone 11", conditions: "", baron: true },
                    { name: "Gamblast", level: "-", location: "Zone 11", conditions: "", baron: true },
                    { name: "Flagadoss", level: "-", location: "Zone 11", conditions: "", baron: true }
                ]
            },
            {
                number: 12,
                name: "Zone sauvage 12",
                pokemon: [
                    { name: "Sorbébé", level: "-", location: "Zone 12", conditions: "" },
                    { name: "Chevroum", level: "-", location: "Zone 12", conditions: "" },
                    { name: "Cadoizo", level: "-", location: "Zone 12", conditions: "" },
                    { name: "Machoc", level: "-", location: "Zone 12", conditions: "" },
                    { name: "Machopeur", level: "-", location: "Zone 12", conditions: "" },
                    { name: "Blizzi", level: "-", location: "Zone 12", conditions: "", baron: true },
                    { name: "Grelaçon", level: "-", location: "Zone 12", conditions: "", baron: true },
                    { name: "Stalgamin", level: "-", location: "Zone 12", conditions: "", baron: true },
                    { name: "Blizzaroi", level: "-", location: "Zone 12", conditions: "", baron: true }
                ]
            },
            {
                number: 13,
                name: "Zone sauvage 13",
                pokemon: [
                    { name: "Insécateur", level: "-", location: "Zone 13", conditions: "" },
                    { name: "Prismillon", level: "-", location: "Zone 13", conditions: "" },
                    { name: "Scarabrute", level: "-", location: "Zone 13", conditions: "" },
                    { name: "Scarhino", level: "-", location: "Zone 13", conditions: "" },
                    { name: "Boustiflor", level: "-", location: "Zone 13", conditions: "", baron: true },
                    { name: "Brocélôme", level: "-", location: "Zone 13", conditions: "", baron: true },
                    { name: "Desséliande", level: "-", location: "Zone 13", conditions: "", baron: true }
                ]
            },
            {
                number: 14,
                name: "Zone sauvage 14",
                pokemon: [
                    { name: "Onix", level: "-", location: "Zone 14", conditions: "" },
                    { name: "Rototaupe", level: "-", location: "Zone 14", conditions: "" },
                    { name: "Minotaupe", level: "-", location: "Zone 14", conditions: "" },
                    { name: "Emolga", level: "-", location: "Zone 14", conditions: "" },
                    { name: "Galekid", level: "-", location: "Zone 14", conditions: "" },
                    { name: "Galegon", level: "-", location: "Zone 14", conditions: "", baron: true },
                    { name: "Galvaran", level: "-", location: "Zone 14", conditions: "", baron: true }
                ]
            },
            {
                number: 15,
                name: "Zone sauvage 15",
                pokemon: [
                    { name: "Dardargnan", level: "-", location: "Zone 15", conditions: "", baron: true },
                    { name: "Spectrum", level: "-", location: "Zone 15", conditions: "" },
                    { name: "Embrylex", level: "-", location: "Zone 15", conditions: "" },
                    { name: "Scobolide", level: "-", location: "Zone 15", conditions: "" },
                    { name: "Brutapode", level: "-", location: "Zone 15", conditions: "" },
                    { name: "Polichombr", level: "-", location: "Zone 15", conditions: "" },
                    { name: "Pitrouille", level: "-", location: "Zone 15", conditions: "" },
                    { name: "Branette", level: "-", location: "Zone 15", conditions: "", baron: true },
                    { name: "Banshitrouye", level: "-", location: "Zone 15", conditions: "", baron: true }
                ]
            },
            {
                number: 16,
                name: "Zone sauvage 16",
                pokemon: [
                    { name: "Staross", level: "-", location: "Zone 16", conditions: "" },
                    { name: "Lainergie", level: "-", location: "Zone 16", conditions: "" },
                    { name: "Charmina", level: "-", location: "Zone 16", conditions: "" },
                    { name: "Florges", level: "-", location: "Zone 16 (Rouge, Orange, Jaune, Bleue et Blanche)", conditions: "" },
                    { name: "Golgopathe", level: "-", location: "Zone 16", conditions: "" },
                    { name: "Grenousse", level: "-", location: "Zone 16", conditions: "", baron: true },
                    { name: "Hexadron", level: "-", location: "Zone 16", conditions: "", baron: true },
                    { name: "Pharamp", level: "-", location: "Zone 16", conditions: "", baron: true }
                ]
            },
            {
                number: 17,
                name: "Zone sauvage 17",
                pokemon: [
                    { name: "Airmure", level: "-", location: "Zone 17", conditions: "" },
                    { name: "Mélancolux", level: "-", location: "Zone 17", conditions: "" },
                    { name: "Némélios", level: "-", location: "Zone 17", conditions: "", baron: true },
                    { name: "Marisson", level: "-", location: "Zone 17", conditions: "" },
                    { name: "Excavarenne", level: "-", location: "Zone 17", conditions: "" },
                    { name: "Trousselin", level: "-", location: "Zone 17", conditions: "", baron: true },
                    { name: "Mysdibule", level: "-", location: "Zone 17", conditions: "", baron: true }
                ]
            },
            {
                number: 18,
                name: "Zone sauvage 18",
                pokemon: [
                    { name: "Tylton", level: "-", location: "Zone 18", conditions: "" },
                    { name: "Altaria", level: "-", location: "Zone 18", conditions: "" },
                    { name: "Sonistrelle", level: "-", location: "Zone 18", conditions: "" },
                    { name: "Bruyverne", level: "-", location: "Zone 18", conditions: "" },
                    { name: "Draby", level: "-", location: "Zone 18", conditions: "" },
                    { name: "Feunnec", level: "-", location: "Zone 18", conditions: "", baron: true },
                    { name: "Drattak", level: "-", location: "Zone 18", conditions: "", baron: true },
                    { name: "Lockpin", level: "-", location: "Zone 18", conditions: "", baron: true }
                ]
            },
            {
                number: 19,
                name: "Zone sauvage 19",
                pokemon: [
                    { name: "Évoli", level: "-", location: "Zone 19", conditions: "" },
                    { name: "Draïeul", level: "-", location: "Zone 19", conditions: "" },
                    { name: "Kangourex", level: "-", location: "Zone 19", conditions: "" },
                    { name: "Mélo", level: "-", location: "Zone 19", conditions: "" },
                    { name: "Mélofée", level: "-", location: "Zone 19", conditions: "" },
                    { name: "Couafarel", level: "-", location: "Zone 19", conditions: "", baron: true },
                    { name: "Nanméouïe", level: "-", location: "Zone 19", conditions: "", baron: true }
                ]
            },
            {
                number: 20,
                name: "Zone sauvage 20",
                pokemon: [
                    { name: "Salamèche", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Bulbizarre", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Carapuce", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Lucario", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Sepiatroce", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Hippodocus", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Gardevoir", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Baggaïd", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Roserade", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Galeking", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Kravarech", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Gruikui", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Kaiminus", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Germignon", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Miasmax", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Carchacrok", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Métalosse", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Momartik", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Altaria", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Kangourex", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Mackogneur", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Staross", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Ectoplasma", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Phyllali", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Aquali", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Pyroli", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Voltali", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Léviator", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Charmina", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Scarhino", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Nymphali", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Absol", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Tyranocif", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Draïeul", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Strassie", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Hexadron", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Cadoizo", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Scarabrute", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Sepiatroce", level: "-", location: "Zone 20", conditions: "", baron: true },
                    { name: "Exagide", level: "-", location: "Zone 20 (Forme Parade)", conditions: "" },
                    { name: "Givrali", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Mélodelfe", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Raichu", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Alakazam", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Flambusard", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Ohmassacre", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Excavarenne", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Florges", level: "-", location: "Zone 20 (Rouge, Orange, Jaune, Bleue et Blanche)", conditions: "" },
                    { name: "Airmure", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Gallame", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Empiflor", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Dracolosse", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Brutalibré", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Dedenne", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Iguolta", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Hippodocus", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Muplodocus", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Banshitrouye", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Trousselin", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Bruyverne", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Golgopathe", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Ténéfix", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Migalos", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Couafarel", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Limonde", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Lugulabre", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Prismillon", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Sorbouboul", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Feuiloutan", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Flotoutan", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Flamoutan", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Brutapode", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Crocorible", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Baggaïd", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Miasmax", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Pandarbare", level: "-", location: "Zone 20", conditions: "" },
                    { name: "Chevroum", level: "-", location: "Zone 20", conditions: "" }
                ]
            }
        ];

        // Ajouter automatiquement time: "both" pour les Pokémon sans cette propriété
        zonesData.forEach(zone => {
            zone.pokemon.forEach(pokemon => {
                if (!pokemon.time) {
                    pokemon.time = "both";
                }
            });
        });

        // Populate zone filter
        const zoneFilter = document.getElementById('zoneFilter');
        zonesData.forEach(zone => {
            const option = document.createElement('option');
            option.value = zone.number;
            option.textContent = `Zone ${zone.number} - ${zone.name}`;
            zoneFilter.appendChild(option);
        });

        // Calculate total Pokemon
        let totalPokemon = 0;
        zonesData.forEach(zone => {
            totalPokemon += zone.pokemon.length;
        });
        document.getElementById('totalPokemon').textContent = totalPokemon;

        // Display zones
        function displayZones(filteredZones) {
            const container = document.getElementById('zonesContainer');
            container.innerHTML = '';

            if (filteredZones.length === 0) {
                container.innerHTML = `
                    <div class="no-results">
                        <h2>Aucun résultat</h2>
                        <p>Aucun Pokémon ou zone ne correspond à votre recherche.</p>
                    </div>
                `;
                return;
            }

            filteredZones.forEach(zone => {
                const zoneCard = document.createElement('div');
                zoneCard.className = 'zone-card';

                const zoneHeader = `
                    <div class="zone-header">
                        <div class="zone-title">${zone.name}</div>
                        <div class="zone-number">Zone ${zone.number}</div>
                    </div>
                `;

                const pokemonCards = zone.pokemon.map(pokemon => {
                let timeIcon = '';
                let timeLabel = '';
                let timeClass = '';
                
                if (pokemon.time === 'day') {
                    timeIcon = '☀️';
                    timeLabel = 'Jour';
                    timeClass = 'day';
                } else if (pokemon.time === 'night') {
                    timeIcon = '🌙';
                    timeLabel = 'Nuit';
                    timeClass = 'night';
                } else if (pokemon.time === 'both') {
                    timeIcon = '🌓';
                    timeLabel = 'Jour & Nuit';
                    timeClass = 'both';
                }
                
                return `
                    <div class="pokemon-card">
                        <div class="pokemon-name">
                            ${pokemon.name}
                            ${pokemon.baron ? '<span class="baron-badge">👑 BARON</span>' : ''}
                        </div>
                        <div class="time-badges">
                            <span class="time-badge ${timeClass}">${timeIcon} ${timeLabel}</span>
                        </div>
                        ${pokemon.level !== '-' ? `<div class="pokemon-level">Niveau ${pokemon.level}</div>` : ''}
                        <div class="pokemon-location">📍 ${pokemon.location}</div>
                        ${pokemon.conditions ? `<div class="pokemon-conditions">⚠️ ${pokemon.conditions}</div>` : ''}
                    </div>
                `;
            }).join('');

                zoneCard.innerHTML = `
                    ${zoneHeader}
                    <div class="pokemon-grid">
                        ${pokemonCards}
                    </div>
                `;

                container.appendChild(zoneCard);
            });
        }

        // Filter function
        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const selectedZone = document.getElementById('zoneFilter').value;
            const displayFilter = document.getElementById('displayFilter').value;
            const timeFilter = document.getElementById('timeFilter').value;

            let filteredZones = zonesData.map(zone => {
                // Filter by zone number
                if (selectedZone && zone.number.toString() !== selectedZone) {
                    return null;
                }

                // Filter pokemon
                let filteredPokemon = zone.pokemon.filter(pokemon => {
                    // Search filter
                    const matchesSearch = searchTerm === '' || 
                        pokemon.name.toLowerCase().includes(searchTerm) ||
                        zone.name.toLowerCase().includes(searchTerm);

                    // Baron filter
                    const matchesDisplay = displayFilter === 'all' || 
                        (displayFilter === 'baron' && pokemon.baron);

                    // Time filter
                    const matchesTime = timeFilter === 'all' || 
                        pokemon.time === timeFilter ||
                        (timeFilter === 'both' && pokemon.time === 'both');

                    return matchesSearch && matchesDisplay && matchesTime;
                });

                if (filteredPokemon.length > 0) {
                    return {
                        ...zone,
                        pokemon: filteredPokemon
                    };
                }

                return null;
            }).filter(zone => zone !== null);

            displayZones(filteredZones);
        }

        // Event listeners
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('zoneFilter').addEventListener('change', applyFilters);
        document.getElementById('displayFilter').addEventListener('change', applyFilters);
        document.getElementById('timeFilter').addEventListener('change', applyFilters);

        // Initial display
        displayZones(zonesData);
    </script>
</body>
</html>