import React from "react";

const styles = { select: { margin: "0 20px" } };

const getColumns = () => {
  return [ 
    {
      id: "1",
      field: "id",
      label: "Product Id",
    
    },
    {
      id: "2",
      field: "product_name",
      label: "Product Name"
    },
    {
      id: "3",
      field: "style",
      label: "Style"
    },
    {
      id: "4",
      field: "brand",
      label: "Brand"
    },
    {
      id: "5",
      field: "skus",
      label: "Skus",
      
    },
    
  ];
};

export default getColumns;
