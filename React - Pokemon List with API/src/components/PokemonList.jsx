// PokemonList.js
import React, { useState, useEffect, useRef } from 'react';
import './styles.css';
import PokemonDetails from './PokemonDetails';

function PokemonList() {
  const [allPokemon, setAllPokemon] = useState([]);
  const [renderedPokemon, setRenderedPokemon] = useState([]);
  const [searchQuery, setSearchQuery] = useState('');
  const [selectedPokemon, setSelectedPokemon] = useState(null);
  const popupRef = useRef(null);

  useEffect(() => {
    async function fetchData() {
      const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=300&offset=0');
      const data = await response.json();

      const promises = data.results.map((poke) => {
        const imageUrl = `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${poke.url.split('/')[6]}.png`;

        return {
          key: poke.url,
          imageUrl: imageUrl,
          name: poke.name,
        };
      });

      setAllPokemon(promises);
    }

    fetchData();
  }, []);

  useEffect(() => {
    const filteredPokemon = allPokemon.filter(poke =>
      poke.name.toLowerCase().includes(searchQuery.toLowerCase())
    );
    setRenderedPokemon(filteredPokemon);
  }, [searchQuery, allPokemon]);

  const handlePokemonClick = async (pokemon, event) => {
    const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemon.name}`);
    const data = await response.json();
    setSelectedPokemon(data);
  };

  const closePopup = () => {
    setSelectedPokemon(null);
  };

  const handlePopupClick = (event) => {
    if (popupRef.current && !popupRef.current.contains(event.target)) {
      closePopup();
    }
  };

  return (
    <div className="pokemon-container" onClick={handlePopupClick}>
      <h1>Pokémon List</h1>
      <input
        className="input"
        type="text"
        placeholder="Search Pokémon by name..."
        value={searchQuery}
        onChange={(e) => setSearchQuery(e.target.value)}
      />
      <div className="single-pokemon">
        {renderedPokemon.length > 0 ? (
          renderedPokemon.map((poke) => (
            <div
              key={poke.key}
              className="pokemon-card"
              onClick={(e) => handlePokemonClick(poke, e)}
            >
              {poke.imageUrl && (
                <img src={poke.imageUrl} alt={poke.name} loading="lazy" />
              )}
              <p>{poke.name}</p>
            </div>
          ))
        ) : (
          <h1>Loading...</h1>
        )}
      </div>
      {selectedPokemon && (
        <div className="popup-overlay">
          <div
            className="popup"
            ref={popupRef}
          >
            <PokemonDetails
              name={selectedPokemon.name}
              imageUrl={selectedPokemon.sprites.front_default}
              details={selectedPokemon}
            />
            <button onClick={closePopup}>Close</button>
          </div>
        </div>
      )}
    </div>
  );
}

export default PokemonList;
