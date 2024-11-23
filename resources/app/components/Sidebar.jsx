import React, { useContext } from "react";
import { AppContext } from "../providers/AppProvider";
import { Link } from "react-router-dom";
export default function Sidebar() {
  const { logOut, user } = useContext(AppContext);
  return (
  <></>
  );
}
