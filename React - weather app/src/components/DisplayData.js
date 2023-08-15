import React, { useState, useEffect } from "react";
import SearchData from "./SearchData";
import './style.css';

function DisplayData() {
  const [data, setData] = useState([]);
  const [city, setCity] = useState("");
  const [unit, setUnit] = useState("celsius");
  const [currentTime, setCurrentTime] = useState(new Date());
  const [forecastData, setForecastData] = useState([]);

  useEffect(() => {
    const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=02bcd41dc5bb2409fc845a22f48cad70`;
    const forecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=02bcd41dc5bb2409fc845a22f48cad70`;
  
    fetch(weatherUrl)
      .then((response) => response.json())
      .then((data) => setData(data))
      .catch((error) => {
        console.error("Error fetching current weather:", error);
      });
  
    fetch(forecastUrl)
      .then((response) => response.json())
      .then((forecastData) => setForecastData(forecastData.list))
      .catch((error) => {
        console.error("Error fetching forecast data:", error);
      });
  }, [city]);

  useEffect(() => {
    const interval = setInterval(() => {
      setCurrentTime(new Date());
    }, 1000);

    return () => {
      clearInterval(interval);
    };
  }, []);

  const convertTemperature = (temp) => {
    if (unit === "fahrenheit") {
      return ((temp - 273.15) * 1.8 + 32).toFixed(1) + " °F";
    }
    return (temp - 273.15).toFixed(1) + " °C";
  };

  let temp = "";
  if (data.main && data.main.temp) {
    temp = convertTemperature(data.main.temp);
  }

  const formattedDate = currentTime.toLocaleDateString();
  const formattedTime = currentTime.toLocaleTimeString();

  const uniqueForecastDates = new Set();
  const uniqueForecastItems = forecastData && forecastData.filter((forecast) => {
    const date = new Date(forecast.dt * 1000);
    const currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);
    if (date >= currentDate && !uniqueForecastDates.has(date.toLocaleDateString())) {
      uniqueForecastDates.add(date.toLocaleDateString());
      return true;
    }
    return false;
  });

  return (
    <div className="data">
      <SearchData onCityChange={setCity} /><br/>
      <div className="clock">{formattedTime}</div>
      <div className="date">{formattedDate}</div>
      {data.name && data.sys.country && <span>{data.name}, {data.sys.country}</span>}<br/>
      {data.weather && data.weather[0] && data.weather[0].main && (
        <span>Sky: {data.weather[0].main}</span>
      )}<br/>
      {temp && <span>Temp: {temp} </span>}
      {data.name && data.sys.country && (
        <div>
          <button onClick={() => setUnit("celsius")} className="temp">°C</button>
          <button onClick={() => setUnit("fahrenheit")} className="temp">°F</button>
        </div>
      )}<br/>
      <div className="forecast">
        {uniqueForecastItems && uniqueForecastItems.length > 0 ? (
          uniqueForecastItems.map((forecast) => (
            <div className="forecast-item" key={forecast.dt}>
              <div className="forecast-date">{new Date(forecast.dt * 1000).toLocaleDateString()}</div>
              <div>{forecast.weather[0].description}</div>
              <img src={`https://openweathermap.org/img/w/${forecast.weather[0].icon}.png`} alt="Weather icon" />
              <div>{convertTemperature(forecast.main.temp)}</div>
            </div>
          ))
        ) : (
          <div>No forecast data available</div>
        )}
      </div>
    </div>
  );
};

export default DisplayData;
