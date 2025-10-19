<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méga Gemmes - Légendes Pokémon Z-A</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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

        .navigation {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .nav-button {
            background: white;
            color: #f5576c;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .nav-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .nav-button.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
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
            border-color: #f5576c;
            box-shadow: 0 0 0 3px rgba(245, 87, 108, 0.1);
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
            border-color: #f5576c;
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
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .mega-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
        }

        .mega-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border-top: 4px solid;
        }

        .mega-card.mission {
            border-top-color: #4CAF50;
        }

        .mega-card.shop {
            border-top-color: #FF9800;
        }

        .mega-card.exchange {
            border-top-color: #2196F3;
        }

        .mega-card.ranked {
            border-top-color: #9C27B0;
        }

        .mega-card.dlc {
            border-top-color: #F44336;
        }

        .mega-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .mega-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .mega-name {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
        }

        .method-badge {
            padding: 6px 14px;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: bold;
            color: white;
            white-space: nowrap;
        }

        .method-badge.mission {
            background: #4CAF50;
        }

        .method-badge.shop {
            background: #FF9800;
        }

        .method-badge.exchange {
            background: #2196F3;
        }

        .method-badge.ranked {
            background: #9C27B0;
        }

        .method-badge.dlc {
            background: #F44336;
        }

        .gem-name {
            display: inline-block;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 1.1em;
            font-weight: bold;
            margin: 10px 0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }

        .how-to-obtain {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            color: #555;
            line-height: 1.6;
            margin-top: 15px;
        }

        .how-to-obtain strong {
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        .no-results {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .no-results h2 {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

            .mega-grid {
                grid-template-columns: 1fr;
            }

            .mega-header {
                flex-direction: column;
                gap: 10px;
            }
        }

        .legend {
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .legend h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.2em;
        }

        .legend-items {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .legend-icon {
            width: 20px;
            height: 20px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>💎 Méga Gemmes Pokémon Z-A</h1>
            <p>Guide complet pour obtenir toutes les Méga Gemmes</p>
        </header>

        <div class="navigation">
            <a href="#" class="nav-button" onclick="alert('Lien vers la page Pokédex')">🎮 Pokédex des Zones</a>
            <a href="#" class="nav-button active">💎 Méga Gemmes</a>
        </div>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-number" id="totalGems">68</div>
                <div class="stat-label">Méga Gemmes</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" id="totalMegas">68</div>
                <div class="stat-label">Méga-Évolutions</div>
            </div>
        </div>

        <div class="legend">
            <h3>📋 Légende des méthodes d'obtention</h3>
            <div class="legend-items">
                <div class="legend-item">
                    <div class="legend-icon" style="background: #4CAF50;"></div>
                    <span>Mission principale</span>
                </div>
                <div class="legend-item">
                    <div class="legend-icon" style="background: #FF9800;"></div>
                    <span>Boutique (Joyaux de Kalos)</span>
                </div>
                <div class="legend-item">
                    <div class="legend-icon" style="background: #2196F3;"></div>
                    <span>Échange Méga-éclats</span>
                </div>
                <div class="legend-item">
                    <div class="legend-icon" style="background: #9C27B0;"></div>
                    <span>Combats classés</span>
                </div>
                <div class="legend-item">
                    <div class="legend-icon" style="background: #F44336;"></div>
                    <span>DLC</span>
                </div>
            </div>
        </div>

        <div class="search-filters">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="🔍 Rechercher une Méga-Évolution ou une gemme...">
            </div>
            <div class="filters">
                <div class="filter-group">
                    <label>Méthode d'obtention</label>
                    <select id="methodFilter">
                        <option value="all">Toutes les méthodes</option>
                        <option value="mission">Mission principale</option>
                        <option value="shop">Boutique Joyaux de Kalos</option>
                        <option value="exchange">Échange Méga-éclats</option>
                        <option value="ranked">Combats classés</option>
                        <option value="dlc">DLC</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label>Trier par</label>
                    <select id="sortFilter">
                        <option value="name">Nom (A-Z)</option>
                        <option value="method">Méthode d'obtention</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mega-grid" id="megaGrid"></div>
    </div>

    <script>
        const megaGemsData = [
            { name: "Méga-Méganium", gem: "Méganiumite", method: "mission", howTo: "Mission principale 10 si vous avez choisi Germignon comme Pokémon de départ. Vous devez avoir terminé les missions 11 à 13. Disponible pour 100 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Roitiflam", gem: "Roitiflamite", method: "mission", howTo: "Mission principale 10 si vous avez choisi Gruikui comme Pokémon de départ. Vous devez avoir terminé les missions 11 à 13. Disponible pour 100 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Aligatueur", gem: "Aligatueurite", method: "mission", howTo: "Mission principale 10 si vous avez choisi Kaiminus comme Pokémon de départ. Vous devez avoir terminé les missions 11 à 13. Disponible pour 100 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Dardargnan", gem: "Dardargnite", method: "mission", howTo: "Finir la mission 16" },
            { name: "Méga-Roucarnage", gem: "Roucarnagite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Pharamp", gem: "Pharampite", method: "mission", howTo: "Finir la mission 23" },
            { name: "Méga-Léviator", gem: "Léviatorite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Golgopathe", gem: "Golgopathite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Staross", gem: "Starossite", method: "mission", howTo: "Finir la mission 34" },
            { name: "Méga-Floette", gem: "Floettite", method: "mission", howTo: "Finir la mission 27. Uniquement sur Floette Fleur Éternelle" },
            { name: "Méga-Némélios", gem: "Néméliosite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar après la mission 37" },
            { name: "Méga-Raichu X", gem: "?", method: "dlc", howTo: "DLC Méga-Dimension" },
            { name: "Méga-Raichu Y", gem: "?", method: "dlc", howTo: "DLC Méga-Dimension" },
            { name: "Méga-Mélodelfe", gem: "Mélodelfite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar durant la mission 31" },
            { name: "Méga-Alakazam", gem: "Alakazamite", method: "exchange", howTo: "Échanger 360 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Ectoplasma", gem: "Ectoplasmite", method: "shop", howTo: "Disponible pour 50 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Brutapode", gem: "Brutapodite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar. Finir la mission 25" },
            { name: "Méga-Empiflor", gem: "Empiflorite", method: "mission", howTo: "Finir la mission 13" },
            { name: "Méga-Charmina", gem: "Charminite", method: "shop", howTo: "Disponible pour 50 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Élecsprint", gem: "Élecsprintite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Gardevoir", gem: "Gardevoirite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar. Finir la mission 25" },
            { name: "Méga-Gallame", gem: "Gallamite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar. Finir la mission 25" },
            { name: "Méga-Démolosse", gem: "Démolossite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Altaria", gem: "Altarite", method: "mission", howTo: "Finir la mission 28" },
            { name: "Méga-Nanméouïe", gem: "Nanméouite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Lockpin", gem: "Lockpinite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Branette", gem: "Branettite", method: "mission", howTo: "Finir la mission 19" },
            { name: "Méga-Camérupt", gem: "Caméruptite", method: "mission", howTo: "Finir la mission 12" },
            { name: "Méga-Minotaupe", gem: "Minotaupite", method: "exchange", howTo: "Échanger 360 Méga-éclats après avoir fini la mission 15" },
            { name: "Méga-Carchacrok", gem: "Carchacrokite", method: "shop", howTo: "Disponible pour 70 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Ténéfix", gem: "Ténéfixite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Mysdibule", gem: "Mysdibulite", method: "mission", howTo: "Finir la mission 21" },
            { name: "Méga-Absol", gem: "Absolite", method: "mission", howTo: "Finir la mission 9" },
            { name: "Méga-Lucario", gem: "Lucarite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Flagadoss", gem: "Flagadossite", method: "mission", howTo: "Finir la mission 11" },
            { name: "Méga-Sharpedo", gem: "Sharpedite", method: "exchange", howTo: "Échanger 180 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Ohmassacre", gem: "Ohmassacrite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar après avoir fini la mission 15" },
            { name: "Méga-Dracolosse", gem: "Dracolossite", method: "mission", howTo: "Finir la mission 32" },
            { name: "Méga-Florizarre", gem: "Florizarrite", method: "mission", howTo: "Finir la mission 20" },
            { name: "Méga-Dracaufeu X", gem: "Dracaufite X", method: "shop", howTo: "Disponible pour 100 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Dracaufeu Y", gem: "Dracaufite Y", method: "shop", howTo: "Disponible pour 100 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Tortank", gem: "Tortankite", method: "shop", howTo: "Disponible pour 100 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Sepiatroce", gem: "Sepiatrocite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar après la mission 37" },
            { name: "Méga-Kravarech", gem: "Kravarekite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar durant la mission 31" },
            { name: "Méga-Oniglali", gem: "Oniglalite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Momartik", gem: "Momartikite", method: "mission", howTo: "Finir la mission 27" },
            { name: "Méga-Blizzaroi", gem: "Blizzarite", method: "shop", howTo: "Disponible pour 50 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Cizayox", gem: "Cizayoxite", method: "shop", howTo: "Disponible pour 50 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Scarabrute", gem: "Scarabruite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar après avoir fini la mission 15" },
            { name: "Méga-Scarhino", gem: "Scarhinoïte", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Brutalibré", gem: "Brutalibrite", method: "mission", howTo: "Finir la mission 17" },
            { name: "Méga-Baggaïd", gem: "Baggaïdite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar durant la mission 31" },
            { name: "Méga-Lugulabre", gem: "Lugulabrite", method: "exchange", howTo: "Échanger 360 Méga-éclats à la Tour de la société Quazar durant la mission 20" },
            { name: "Méga-Ptéra", gem: "Ptéraïte", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Steelix", gem: "Steelixite", method: "shop", howTo: "Disponible pour 70 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Galeking", gem: "Galekingite", method: "exchange", howTo: "Échanger 360 Méga-éclats à la Tour de la société Quazar durant la mission 20" },
            { name: "Méga-Tyranocif", gem: "Tyranocivite", method: "mission", howTo: "Finir la mission 33" },
            { name: "Méga-Amphinobi", gem: "Amphinolite", method: "ranked", howTo: "Atteindre le rang K dans la saison 1 des combats classés" },
            { name: "Méga-Hexadron", gem: "Hexadronite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar durant la mission 20" },
            { name: "Méga-Blindépique", gem: "Blindépiquite", method: "ranked", howTo: "Atteindre un certain rang dans la saison 3 des combats classés" },
            { name: "Méga-Airmure", gem: "Airmurite", method: "exchange", howTo: "Échanger 240 Méga-éclats à la Tour de la société Quazar durant la mission 25" },
            { name: "Méga-Goupelin", gem: "Goupelinite", method: "ranked", howTo: "Atteindre un certain rang dans la saison 2 des combats classés" },
            { name: "Méga-Drattak", gem: "Drattakite", method: "exchange", howTo: "Échanger 360 Méga-éclats à la Tour de la société Quazar durant la mission 31" },
            { name: "Méga-Kangourex", gem: "Kangourexite", method: "shop", howTo: "Disponible pour 70 000 ₽ à Joyaux de Kalos" },
            { name: "Méga-Draïeul", gem: "Draïeulite", method: "exchange", howTo: "Échanger 360 Méga-éclats à la Tour de la société Quazar" },
            { name: "Méga-Métalosse", gem: "Métalossite", method: "exchange", howTo: "Échanger 360 Méga-éclats à la Tour de la société Quazar durant la mission 31" },
            { name: "Méga-Zygarde", gem: "Zygardite", method: "mission", howTo: "Finir la mission 37" }
        ];

        const methodLabels = {
            mission: "Mission",
            shop: "Boutique",
            exchange: "Échange",
            ranked: "Classé",
            dlc: "DLC"
        };

        function displayMegaGems(gems) {
            const container = document.getElementById('megaGrid');
            container.innerHTML = '';

            if (gems.length === 0) {
                container.innerHTML = `
                    <div class="no-results">
                        <h2>Aucun résultat</h2>
                        <p>Aucune Méga Gemme ne correspond à votre recherche.</p>
                    </div>
                `;
                return;
            }

            gems.forEach(mega => {
                const card = document.createElement('div');
                card.className = `mega-card ${mega.method}`;
                
                card.innerHTML = `
                    <div class="mega-header">
                        <div class="mega-name">${mega.name}</div>
                        <div class="method-badge ${mega.method}">${methodLabels[mega.method]}</div>
                    </div>
                    <div class="gem-name">💎 ${mega.gem}</div>
                    <div class="how-to-obtain">
                        <strong>📍 Comment l'obtenir :</strong>
                        ${mega.howTo}
                    </div>
                `;
                
                container.appendChild(card);
            });
        }

        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const methodFilter = document.getElementById('methodFilter').value;
            const sortFilter = document.getElementById('sortFilter').value;

            let filteredGems = megaGemsData.filter(mega => {
                const matchesSearch = searchTerm === '' || 
                    mega.name.toLowerCase().includes(searchTerm) ||
                    mega.gem.toLowerCase().includes(searchTerm);

                const matchesMethod = methodFilter === 'all' || mega.method === methodFilter;

                return matchesSearch && matchesMethod;
            });

            // Sorting
            if (sortFilter === 'name') {
                filteredGems.sort((a, b) => a.name.localeCompare(b.name));
            } else if (sortFilter === 'method') {
                const methodOrder = { mission: 1, shop: 2, exchange: 3, ranked: 4, dlc: 5 };
                filteredGems.sort((a, b) => methodOrder[a.method] - methodOrder[b.method]);
            }

            displayMegaGems(filteredGems);
        }

        // Event listeners
        document.getElementById('searchInput').addEventListener('input', applyFilters);
        document.getElementById('methodFilter').addEventListener('change', applyFilters);
        document.getElementById('sortFilter').addEventListener('change', applyFilters);

        // Initial display
        displayMegaGems(megaGemsData);
    </script>
</body>
</html>