import React, { useState } from "react";
import './style.css';

function SearchData({ onCityChange }) {
  const [city, setCity] = useState("");

  const handleCityChange = (event) => {
    setCity(event.target.value);
    onCityChange(event.target.value);
  };

  return (
    <div>
      <input
        type="text"
        placeholder="Enter city"
        value={city}
        onChange={handleCityChange}
        className="input"
      />
    </div>
  );
}

export default SearchData;
