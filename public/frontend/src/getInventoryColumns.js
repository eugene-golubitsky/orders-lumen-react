import React from "react";

const styles = { select: { margin: "0 20px" } };

const getColumns = () => {
  return [ 

    {
      id: "2",
      field: "product_name",
      label: "Product Name"
    },
    {
      id: "3",
      field: "sku",
      label: "Sku"
    },
    {
      id: "4",
      field: "quantity",
      label: "Quantity"
    },
    {
      id: "5",
      field: "color",
      label: "Color",  
    },
    {
      id: "6",
      field: "size",
      label: "Size",
    },
    {
      id: "7",
      field: "price_cents",
      label: "Price (cents)",
    },
    {
      id: "8",
      field: "cost_cents",
      label: "Cost (cents)",
    },
  ];
};

export default getColumns;
