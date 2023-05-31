import React, { useState } from "react";
import GridTable from "@nadavshaar/react-grid-table";
import getColumns from "./getProductColumns.js";
import axios from "axios";

export const Products = (props) => {

    const getInventory = async (id) => {
        /**
         * TODO move to .env
         */
        const baseUrl = "http://localhost:8000";
    
        const access_token = sessionStorage.getItem('access_token');        
        console.log(`id=${id}, access_token=${access_token}`);
        const data = await axios.post(`${baseUrl}/api/inventory`, {limit: 500, product_id: id}, {headers: { Authorization: `Bearer ${access_token}` }})
        .catch(err => {console.log(err);})
        props.stateChanger('inventory');
        props.setInventory(data?.data);
    }

    const logout = () => {
        sessionStorage.clear();
        props.stateChanger('login');
    }
    return (
    <div>
        <a onClick={logout}>Logout</a>
        <h2>Products</h2>
        <GridTable
            columns={getColumns()}
            rows={props.products}
            onRowClick={(
                { data: { id }, isEdit },
                { rowSelectionApi: { getIsRowSelectable, toggleRowSelection } }
              ) => {getInventory(id)}
            }
        />
    </div>
  );
};
