import './bootstrap';

import Alpine from 'alpinejs';
import LoaderComponent from "./components/LoaderComponent";

window.Alpine = Alpine;

Alpine.start();
const app = createApp({})

app.component('loader-component', LoaderComponent)
