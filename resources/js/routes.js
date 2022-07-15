import List from './components/Ads/List.vue'
import Item from './components/Ads/Item.vue'
import Create from './components/Ads/Create.vue'

export const routes = [
  { path: '/list', name: 'list', component: List },
  { path: '/item/:id', name: 'item', component: Item },
  { path: '/create', name: 'create', component: Create },
];
