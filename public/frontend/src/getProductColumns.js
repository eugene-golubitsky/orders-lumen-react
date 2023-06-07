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
    {
      id: "6",
      field: "total_price",
      label: "Total Revenue",
      sort: ({ a, b, isAscending }) => {
          let aa = 0, bb = 0;
          if(a) {
            aa = parseFloat(a.substr(1))
          } 
          if(b) {
            bb = parseFloat(b.substr(1));
          }
          return aa < bb ? isAscending ? -1 : 1 : (aa > bb ? isAscending ? 1 : -1 : 0);
      }
    },
    
  ];
};

export default getColumns;
