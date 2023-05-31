import React, {useState} from "react";
import GridTable from "@nadavshaar/react-grid-table";
import getColumns from "./getInventoryColumns";

export const Inventory =  (props) => { 
    const getBack = () => {
        props.stateChanger('products');
    }
    return (    
        <div>
            <a onClick={getBack}>Back</a>
            <h2>Inventory</h2>
            <GridTable
                columns={getColumns()}
                rows={props.inventory}
            />
        </div>
        );
}