import { BrowserRouter } from 'react-router-dom';
import './bootstrap';
import { App } from './App';
import ReactDOM from 'react-dom/client';

const root = ReactDOM.createRoot(document.getElementById('frontend-app'));

root.render(
    <BrowserRouter>
        <App></App>
    </BrowserRouter>
)