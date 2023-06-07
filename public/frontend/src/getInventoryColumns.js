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
      field: "price",
      label: "Price",
    },
    {
      id: "8",
      field: "total_price",
      label: "Total Price",
      sort: ({ a, b, isAscending }) => {
        let aa = parseFloat(a.substr(1)), bb = parseFloat(b.substr(1));
        return aa < bb ? isAscending ? -1 : 1 : (aa > bb ? isAscending ? 1 : -1 : 0);
    }
    },
  ];
};

export default getColumns;
