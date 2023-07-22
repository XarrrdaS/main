<template>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div>
    <h1>Produkty</h1>
    <div class="search-container">
      <label for="search">Wyszukaj</label><br>
      <input v-model="searchQuery" placeholder="Wpisz frazę, którą chcesz znaleźć" id="search" autocomplete="off"/>
    </div>
    <div style="overflow: auto">
    <table>
      <thead>
        <tr>
          <th>ID<i class="fa fa-filter" @click="sort('id')"></i></th>
          <th>Nazwa<i class="fa fa-filter" @click="sort('name')"></i></th>
          <th>Kategoria<i class="fa fa-filter" @click="sort('category')"></i></th>
          <th>Cena (PLN)<i class="fa fa-filter" @click="sort('price')"></i></th>
          <th>Cena (USD)<i class="fa fa-filter" @click="sort('price')"></i></th>
          <th>Cena (EUR)<i class="fa fa-filter" @click="sort('price')"></i></th>
          <th>Akcja</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in filteredProducts" :key="product.id">
          <td>{{ product.id }}</td>
          <td>{{ product.name }}</td>
          <td>{{ product.category }}</td>
          <td>{{ product.price }}</td>
          <td>{{ convertCurrency(product.price, 'USD') }}</td>
          <td>{{ convertCurrency(product.price, 'EUR') }}</td>
          <td><button @click="deleteProduct(product.id)" class="delete-button">USUŃ</button></td>
        </tr>
      </tbody>
    </table>
    </div>
    <h2>Dodaj nowy produkt</h2>
    <div class="add-product-container">
    <div>
      <label for="name">Nazwa</label><br>
      <input v-model="newProduct.name" id="name" autocomplete="off"/>
    </div>
    <div>
      <label for="category">Kategoria</label><br>
      <select v-model="newProduct.category" id="category">
        <option disabled selected hidden>Wybierz kategorię</option>
        <option value="Montaż na drzewie">Montaż na drzewie</option>
        <option value="Montaż na ziemi">Montaż na ziemi</option>
        <option value="Bezpośrednie">Bezpośrednie</option>
      </select>
    </div>
    <div>
      <label for="price">Cena (PLN)</label><br>
      <input v-model="newProduct.price" type="number" id="price"/>
    </div>
  </div>
    <button @click="addProduct()" class="add-button">Dodaj produkt</button>
</div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      searchQuery: '',
      products: [],
      newProduct: {
        name: '',
        category: '',
        price: 0,
      },
      sortColumn: '',
      sortOrder: 'asc',
      exchangeRates: {
        USD: 0.25,
        EUR: 0.23,
      },
    };
  },
  computed: {
    filteredProducts() {
    return this.products.filter((product) => {
    const query = this.searchQuery.toLowerCase();
    const pricePLN = product.price;

    return (
      (product.id && product.id.toString().startsWith(query)) ||
      (product.name && product.name.toLowerCase().startsWith(query)) ||
      (product.category && product.category.toLowerCase().startsWith(query)) ||
      (pricePLN && pricePLN.toString().startsWith(query)) ||
      (this.convertCurrency(pricePLN, 'USD') && this.convertCurrency(pricePLN, 'USD').toString().startsWith(query)) ||
      (this.convertCurrency(pricePLN, 'EUR') && this.convertCurrency(pricePLN, 'EUR').toString().startsWith(query))
    );
  });
},


  },
  created() {
  axios.get('/database.json')
    .then(response => {
      this.products = response.data;
    })
    .catch(error => {
      console.log(error);
    });
},
  methods: {
    sort(column) {      
  if (column === this.sortColumn) {

    // Zmiana kolejności sortowania na przeciwną
    this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
  } else {
    // Jeśli kolumna się zmienia, ustaw nową kolumnę i sortuj w kolejności rosnącej
    this.sortColumn = column;
    this.sortOrder = 'asc';
  }

  this.products.sort((a, b) => {
    const fieldA = a[column];
    const fieldB = b[column];

    // Jeśli kolejność sortowania jest rosnąca
    if (this.sortOrder === 'asc') {
      // Jeśli pola są liczbami, posortowanie rosnąco
      if (!isNaN(fieldA) && !isNaN(fieldB)) {
        return fieldA - fieldB;
      } else {
        // W przeciwnym razie sortowanie alfabetycznie
        return fieldA.localeCompare(fieldB);
      }
    } else { // Jeśli kolejność sortowania jest malejąca
      // Jeśli pola są liczbami, posortuj je malejąco
      if (!isNaN(fieldA) && !isNaN(fieldB)) {
        return fieldB - fieldA;
      } else {
        // W przeciwnym razie posortuj je alfabetycznie w kolejności odwrotnej
        return fieldB.localeCompare(fieldA);
      }
    }
  });
},
    addProduct() {
  if (this.newProduct.name && this.newProduct.category && this.newProduct.price) {
    axios
      .get('/database')
      .then(response => {
        const products = response.data;
        let maxId = 0;

        // Znalezienie największego ID
        products.forEach(product => {
          if (product.id > maxId) {
            maxId = product.id;
          }
        });

        // Przygotowanie nowego rekordu
        const newProduct = {
          id: maxId + 1,
          name: this.newProduct.name,
          category: this.newProduct.category,
          price: this.newProduct.price
        };

        // Dodawanie rekordu do JSON
        axios
          .post('/database', newProduct, {
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            }
          })
          .then(response => {
            this.products.push(response.data);
            this.newProduct = {
              id: '',
              name: '',
              category: '',
              price: 0
            };
          })
          .catch(error => {
            console.log(error);
          });
      })
      .catch(error => {
        console.log(error);
      });
  } else {
    alert('Wypełnij wszystkie pola!');
  }
},
deleteProduct(productId) {
  axios
    .get('/database')
    .then(response => {
      let products = response.data;

      // Znalezienie indeksu produktu do usunięcia
      const productIndex = products.findIndex(product => product.id === productId);
      if (productIndex !== -1) {
        // Usunięcie produktu z tablicy
        products.splice(productIndex, 1);

        // Aktualizacja ID oraz indeksowanie produktów
        products = products.map((product, index) => {
          product.id = index + 1;
          return product;
        });

        // Aktualizacja pliku JSON
        axios
          .put('/database', products, {
            headers: {
              'Content-Type': 'application/json',
              'Accept': 'application/json'
            }
          })
          .then(() => {
            console.log('Produkt został usunięty.');

            // Aktualizacja lokalnej listy produktów po usunięciu
            this.products = products;
          })
          .catch(error => {
            console.log(error);
          });
      }
    })
    .catch(error => {
      console.log(error);
    });
},

    convertCurrency(price, currency) {
      const exchangeRate = this.exchangeRates[currency];
      const convertedPrice = price * exchangeRate;
      return convertedPrice.toFixed(2);
    },
  },
};
</script>

<style>
@import '/src/assets/style.css';
</style>