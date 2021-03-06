<?php

namespace Model\Map;

use Model\Freight;
use Model\FreightQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'freights' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class FreightTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.FreightTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'freights';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Freight';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Freight';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'freights.id';

    /**
     * the column name for the destination_id field
     */
    const COL_DESTINATION_ID = 'freights.destination_id';

    /**
     * the column name for the departure_id field
     */
    const COL_DEPARTURE_ID = 'freights.departure_id';

    /**
     * the column name for the location_id field
     */
    const COL_LOCATION_ID = 'freights.location_id';

    /**
     * the column name for the flight_id field
     */
    const COL_FLIGHT_ID = 'freights.flight_id';

    /**
     * the column name for the freight_type field
     */
    const COL_FREIGHT_TYPE = 'freights.freight_type';

    /**
     * the column name for the next_steps field
     */
    const COL_NEXT_STEPS = 'freights.next_steps';

    /**
     * the column name for the route_flights field
     */
    const COL_ROUTE_FLIGHTS = 'freights.route_flights';

    /**
     * the column name for the amount field
     */
    const COL_AMOUNT = 'freights.amount';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /** The enumerated values for the freight_type field */
    const COL_FREIGHT_TYPE_PACKAGES = 'Packages';
    const COL_FREIGHT_TYPE_POST = 'Post';
    const COL_FREIGHT_TYPE_PASSENGERLOW = 'PassengerLow';
    const COL_FREIGHT_TYPE_PASSENGERMID = 'PassengerMid';
    const COL_FREIGHT_TYPE_PASSENGERHIGH = 'PassengerHigh';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'DestinationId', 'DepartureId', 'LocationId', 'FlightId', 'FreightType', 'NextSteps', 'RouteFlights', 'Amount', ),
        self::TYPE_CAMELNAME     => array('id', 'destinationId', 'departureId', 'locationId', 'flightId', 'freightType', 'nextSteps', 'routeFlights', 'amount', ),
        self::TYPE_COLNAME       => array(FreightTableMap::COL_ID, FreightTableMap::COL_DESTINATION_ID, FreightTableMap::COL_DEPARTURE_ID, FreightTableMap::COL_LOCATION_ID, FreightTableMap::COL_FLIGHT_ID, FreightTableMap::COL_FREIGHT_TYPE, FreightTableMap::COL_NEXT_STEPS, FreightTableMap::COL_ROUTE_FLIGHTS, FreightTableMap::COL_AMOUNT, ),
        self::TYPE_FIELDNAME     => array('id', 'destination_id', 'departure_id', 'location_id', 'flight_id', 'freight_type', 'next_steps', 'route_flights', 'amount', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'DestinationId' => 1, 'DepartureId' => 2, 'LocationId' => 3, 'FlightId' => 4, 'FreightType' => 5, 'NextSteps' => 6, 'RouteFlights' => 7, 'Amount' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'destinationId' => 1, 'departureId' => 2, 'locationId' => 3, 'flightId' => 4, 'freightType' => 5, 'nextSteps' => 6, 'routeFlights' => 7, 'amount' => 8, ),
        self::TYPE_COLNAME       => array(FreightTableMap::COL_ID => 0, FreightTableMap::COL_DESTINATION_ID => 1, FreightTableMap::COL_DEPARTURE_ID => 2, FreightTableMap::COL_LOCATION_ID => 3, FreightTableMap::COL_FLIGHT_ID => 4, FreightTableMap::COL_FREIGHT_TYPE => 5, FreightTableMap::COL_NEXT_STEPS => 6, FreightTableMap::COL_ROUTE_FLIGHTS => 7, FreightTableMap::COL_AMOUNT => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'destination_id' => 1, 'departure_id' => 2, 'location_id' => 3, 'flight_id' => 4, 'freight_type' => 5, 'next_steps' => 6, 'route_flights' => 7, 'amount' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /** The enumerated values for this table */
    protected static $enumValueSets = array(
                FreightTableMap::COL_FREIGHT_TYPE => array(
                            self::COL_FREIGHT_TYPE_PACKAGES,
            self::COL_FREIGHT_TYPE_POST,
            self::COL_FREIGHT_TYPE_PASSENGERLOW,
            self::COL_FREIGHT_TYPE_PASSENGERMID,
            self::COL_FREIGHT_TYPE_PASSENGERHIGH,
        ),
    );

    /**
     * Gets the list of values for all ENUM columns
     * @return array
     */
    public static function getValueSets()
    {
      return static::$enumValueSets;
    }

    /**
     * Gets the list of values for an ENUM column
     * @param string $colname
     * @return array list of possible values for the column
     */
    public static function getValueSet($colname)
    {
        $valueSets = self::getValueSets();

        return $valueSets[$colname];
    }

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('freights');
        $this->setPhpName('Freight');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Freight');
        $this->setPackage('Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignPrimaryKey('destination_id', 'DestinationId', 'INTEGER' , 'airports', 'id', true, null, null);
        $this->addForeignPrimaryKey('departure_id', 'DepartureId', 'INTEGER' , 'airports', 'id', true, null, null);
        $this->addForeignKey('location_id', 'LocationId', 'INTEGER', 'airports', 'id', false, null, null);
        $this->addForeignKey('flight_id', 'FlightId', 'INTEGER', 'flights', 'id', false, null, null);
        $this->addColumn('freight_type', 'FreightType', 'ENUM', true, null, 'Packages');
        $this->getColumn('freight_type')->setValueSet(array (
  0 => 'Packages',
  1 => 'Post',
  2 => 'PassengerLow',
  3 => 'PassengerMid',
  4 => 'PassengerHigh',
));
        $this->addColumn('next_steps', 'NextSteps', 'ARRAY', false, null, null);
        $this->addColumn('route_flights', 'RouteFlights', 'ARRAY', false, null, null);
        $this->addColumn('amount', 'Amount', 'SMALLINT', false, null, 0);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Destination', '\\Model\\Airport', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':destination_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Departure', '\\Model\\Airport', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':departure_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('Location', '\\Model\\Airport', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':location_id',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('OnFlight', '\\Model\\Flight', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':flight_id',
    1 => ':id',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Model\Freight $obj A \Model\Freight object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize(array((string) $obj->getId(), (string) $obj->getDestinationId(), (string) $obj->getDepartureId()));
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Model\Freight object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Model\Freight) {
                $key = serialize(array((string) $value->getId(), (string) $value->getDestinationId(), (string) $value->getDepartureId()));

            } elseif (is_array($value) && count($value) === 3) {
                // assume we've been passed a primary key";
                $key = serialize(array((string) $value[0], (string) $value[1], (string) $value[2]));
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Model\Freight object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DestinationId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('DepartureId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize(array((string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('DestinationId', TableMap::TYPE_PHPNAME, $indexType)], (string) $row[TableMap::TYPE_NUM == $indexType ? 2 + $offset : static::translateFieldName('DepartureId', TableMap::TYPE_PHPNAME, $indexType)]));
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('DestinationId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 2 + $offset
                : self::translateFieldName('DepartureId', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? FreightTableMap::CLASS_DEFAULT : FreightTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Freight object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = FreightTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = FreightTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + FreightTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = FreightTableMap::OM_CLASS;
            /** @var Freight $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            FreightTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = FreightTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = FreightTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Freight $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                FreightTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(FreightTableMap::COL_ID);
            $criteria->addSelectColumn(FreightTableMap::COL_DESTINATION_ID);
            $criteria->addSelectColumn(FreightTableMap::COL_DEPARTURE_ID);
            $criteria->addSelectColumn(FreightTableMap::COL_LOCATION_ID);
            $criteria->addSelectColumn(FreightTableMap::COL_FLIGHT_ID);
            $criteria->addSelectColumn(FreightTableMap::COL_FREIGHT_TYPE);
            $criteria->addSelectColumn(FreightTableMap::COL_NEXT_STEPS);
            $criteria->addSelectColumn(FreightTableMap::COL_ROUTE_FLIGHTS);
            $criteria->addSelectColumn(FreightTableMap::COL_AMOUNT);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.destination_id');
            $criteria->addSelectColumn($alias . '.departure_id');
            $criteria->addSelectColumn($alias . '.location_id');
            $criteria->addSelectColumn($alias . '.flight_id');
            $criteria->addSelectColumn($alias . '.freight_type');
            $criteria->addSelectColumn($alias . '.next_steps');
            $criteria->addSelectColumn($alias . '.route_flights');
            $criteria->addSelectColumn($alias . '.amount');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(FreightTableMap::DATABASE_NAME)->getTable(FreightTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(FreightTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(FreightTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new FreightTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Freight or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Freight object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FreightTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Freight) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(FreightTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(FreightTableMap::COL_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(FreightTableMap::COL_DESTINATION_ID, $value[1]));
                $criterion->addAnd($criteria->getNewCriterion(FreightTableMap::COL_DEPARTURE_ID, $value[2]));
                $criteria->addOr($criterion);
            }
        }

        $query = FreightQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            FreightTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                FreightTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the freights table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return FreightQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Freight or Criteria object.
     *
     * @param mixed               $criteria Criteria or Freight object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(FreightTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Freight object
        }

        if ($criteria->containsKey(FreightTableMap::COL_ID) && $criteria->keyContainsValue(FreightTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.FreightTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = FreightQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // FreightTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
FreightTableMap::buildTableMap();
