import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import RootLayout from "./layouts/RootLayout";
import Home from "./pages/Home";
import Login from "./pages/Login";
import Error404 from "./components/404";
import Orders from "./pages/Orders";

export default function RoutesAll() {
  return (
    <Routes>
      <Route path="/" element={<RootLayout />}>
        <Route index element={<Home />} />
        <Route path="/home/:token" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/orders" element={<Orders />} />
        <Route path="*" element={<Error404 />} />
      </Route>
    </Routes>
  );
}
