# Performance Monitoring and Visualization - Product Rental System 

## Overview

This project implements a comprehensive, database-driven bike rental management system—designed to mirror the real-world operations of a vehicle rental business. Leveraging a modular PHP backend and normalized relational database (SQL), the system streamlines bookings, customer and vehicle management, revenue optimization, penalty handling, and advanced business analytics.

## Key Insights & Architecture

- **Domain-Driven Design:**  
  The system encapsulates core rental business logic: vehicle inventory, dynamic booking, customer histories, returns, and automated penalty calculation for overdue rentals.
- **Advanced SQL Modeling:**  
  Robust ER/EER diagrams guided entity and relationship creation, supporting modular scripts for creation, initialization, updating, and querying of all business objects.
- **Operations Analytics:**  
  Queries and dashboard modules (e.g., `highestRev.php`, `penalty.php`, `cube.php`) surface actionable insights: highest-earning vehicles, penalty trends, and aggregated business metrics—enabling data-driven operations.

## Functional Highlights

- **Booking Workflow:**  
  End-to-end reservation, amendment, and payment tracking via an intuitive web interface.
- **Penalty Automation:**  
  Dynamic, rules-driven penalty assignment for late returns, with admin and user visibility.
- **Business Intelligence:**  
  Modular analytics modules for revenue reporting, user activity, and inventory performance.
- **Role Support:**  
  Includes user, admin, and vehicle manager functionality.

## Technical Stack

- **Frontend:** HTML/CSS via PHP server-rendered pages
- **Backend:** Modular PHP application, focused on security and maintainability
- **Database:** MySQL schema (scripts: create, populate, drop, update, advanced query)
- **Documentation:** EER diagrams, schema docs, phase deliverables, usage screenshots


## Sample Use-Cases

- **Operations Teams:** Quickly track bookings, check inventory, and surface top-earning vehicles.
- **Business Owners:** Monitor penalties, optimize pricing/inventory, and access real-time financial summaries.
- **Database/Software Engineers:** Study real-case modular SQL and transaction logic for inventory/rental businesses.

