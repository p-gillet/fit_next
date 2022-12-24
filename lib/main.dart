import 'package:flutter/material.dart';
import 'package:postgres/postgres.dart';

// Only use this when getDBConnection has been called once
PostgreSQLConnection? dbConnection;

// Singleton to get open connection object
Future<dynamic> getDBConnection() {
  dbConnection ??= PostgreSQLConnection("localhost", 5432, "bdr",
      username: "bdr", password: "bdr");

  if (dbConnection!.isClosed) {
    return dbConnection!.open();
  }

  return Future<PostgreSQLConnection>(
      () => dbConnection as PostgreSQLConnection);
}

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Fitnext',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const MyHomePage(title: 'Fitnext Home'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class CRUDTable extends StatefulWidget {
  const CRUDTable({super.key, required this.tableName});

  final String tableName;

  @override
  State<CRUDTable> createState() => CRUDTableState();
}

class CRUDTableState extends State<CRUDTable> {
  @override
  void initState() {
    super.initState();

    fetchTableData = getDBConnection().then((val) => dbConnection!
        .mappedResultsQuery("SELECT * FROM fitnext.${widget.tableName};"));
  }

  late Future<List<Map<String, Map<String, dynamic>>>> fetchTableData;
  List<DataColumn> columns = [];
  List<DataRow> rows = [];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          title: Text("Infos de la table ${widget.tableName}"),
        ),
        body: ListView(padding: const EdgeInsets.all(30), children: [
          FutureBuilder<List<Map<String, Map<String, dynamic>>>>(
            future: fetchTableData,
            builder: ((context, snapshot) {
              if (snapshot.hasData) {
                // Build table UI
                rows = [];

                for (var tableData in snapshot.data!) {
                  for (var rowData in tableData.values) {
                    // Add columns name
                    if (columns.isEmpty) {
                      columns = [];
                      for (var colName in rowData.keys) {
                        columns.add(DataColumn(label: Text(colName)));
                      }
                    }

                    // Add table data
                    List<DataCell> cells = [];

                    for (var cellData in rowData.values) {
                      cells.add(DataCell(Text(cellData.toString())));
                    }

                    rows.add(
                      DataRow(
                        cells: cells,
                      ),
                    );
                  }
                }

                return DataTable(
                  columns: columns,
                  rows: rows,
                );
              } else if (snapshot.hasError) {
                return Column(
                  children: [
                    const Icon(
                      Icons.error_outline,
                      color: Colors.red,
                      size: 60,
                    ),
                    Padding(
                      padding: const EdgeInsets.only(top: 16),
                      child: Text('Error: ${snapshot.error}'),
                    ),
                  ],
                );
              } else {
                return Column(children: const [
                  SizedBox(
                    width: 60,
                    height: 60,
                    child: CircularProgressIndicator(),
                  ),
                  Padding(
                    padding: EdgeInsets.only(top: 16),
                    child: Text('Chargement...'),
                  ),
                ]);
              }
            }),
          ),
          ElevatedButton(
            onPressed: () {
              Navigator.pop(context);
            },
            child: const Text('Go back!'),
          ),
        ]));
  }
}

class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0;

  void _incrementCounter() {
    setState(() {
      _counter++;
    });
  }

  @override
  void initState() {
    super.initState();

    fetchTables = getDBConnection().then((val) => dbConnection!
            .mappedResultsQuery(
                "SELECT table_name FROM information_schema.tables WHERE table_schema = 'fitnext';")
            .then((res) {
          List<String> tableNames = [];

          // Get all table names
          for (var tableData in res) {
            for (var rowData in tableData.values) {
              tableNames.add(rowData["table_name"]);
            }
          }

          return tableNames;
        }));
  }

  late Future<List<String>> fetchTables;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            const Text(
              'You have pushed the button this many times:',
            ),
            Text(
              '$_counter',
              style: Theme.of(context).textTheme.headline4,
            ),
          ],
        ),
      ),
      floatingActionButton: FloatingActionButton(
        onPressed: _incrementCounter,
        tooltip: 'Increment',
        child: const Icon(Icons.add),
      ),
      drawer: Drawer(
        child: ListView(padding: EdgeInsets.zero, children: [
          FutureBuilder<List<String>>(
            future: fetchTables,
            builder: ((context, snapshot) {
              List<Widget> children;
              if (snapshot.hasData) {
                children = <Widget>[
                  Row(children: const [
                    Text("Connecté à la base de données"),
                    Icon(
                      Icons.check_circle_outline,
                      color: Colors.green,
                      size: 20,
                    ),
                  ]),
                  ListView.builder(
                    scrollDirection: Axis.vertical,
                    shrinkWrap: true,
                    itemCount: snapshot.data?.length,
                    itemBuilder: (context, index) {
                      final tableName = snapshot.data?[index] as String;

                      return GestureDetector(
                        child: ListTile(title: Text(tableName)),
                        onTap: () {
                          Navigator.push(
                            context,
                            MaterialPageRoute(
                                builder: (context) =>
                                    CRUDTable(tableName: tableName)),
                          );
                        },
                      );
                    },
                  ),
                ];
              } else if (snapshot.hasError) {
                children = <Widget>[
                  const Icon(
                    Icons.error_outline,
                    color: Colors.red,
                    size: 60,
                  ),
                  Padding(
                    padding: const EdgeInsets.only(top: 16),
                    child: Text('Error: ${snapshot.error}'),
                  ),
                ];
              } else {
                children = const <Widget>[
                  SizedBox(
                    width: 60,
                    height: 60,
                    child: CircularProgressIndicator(),
                  ),
                  Padding(
                    padding: EdgeInsets.only(top: 16),
                    child: Text('Chargement...'),
                  ),
                ];
              }

              return Center(
                  child: Padding(
                padding: const EdgeInsets.all(10),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: children,
                ),
              ));
            }),
          )
        ]),
      ),
    );
  }
}
