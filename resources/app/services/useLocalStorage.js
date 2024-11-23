import React, { useState, useEffect } from "react";

const prefixedKey = "musicapp-";
export default function useLocalStorage(key, initialValue) {
  const prefixedKeyCombined = prefixedKey + key;
  const [value, setValue] = useState(() => {
    const data = JSON.parse(localStorage.getItem(prefixedKeyCombined));
    if (data != null) return data;
    if (typeof initialValue === "function") {
      return initialValue();
    } else {
      return initialValue;
    }
  });

  useEffect(() => {
    if (value == null) return;
    localStorage.setItem(prefixedKeyCombined, JSON.stringify(value));
  }, [prefixedKeyCombined, value]);

  return [value, setValue];
}
