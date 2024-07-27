import React from "react";
import { Route, Routes } from "react-router-dom";
import Home from "../pages/Home";
import UserRegister from "../pages/UserRegister";

export default function RoutesTemplate() {
    return (
        <Routes>
            <Route path="/" element={<Home/>}></Route>
            <Route path="/register" element={<UserRegister/>}></Route>
        </Routes>
    )
}