import React from 'react';

function PokemonDetails({ name, imageUrl, details }) {
  return (
    <div className="pokemon-details">
      <h2>{name}</h2>
      <img src={imageUrl} alt={name} loading="lazy" />
      <div>
        <h3>Abilities:</h3>
        <ul>
          {details.abilities.map((ability, index) => (
            <li key={index}>{ability.ability.name}</li>
          ))}
        </ul>
      </div>
    </div>
  );
}

export default PokemonDetails;
