import 'package:flutter/material.dart';
import 'package:postgres/postgres.dart';

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

    var connection = PostgreSQLConnection("localhost", 5432, "bdr",
        username: "bdr", password: "bdr");

    connection.open().then((conn) {
      conn.mappedResultsQuery("SELECT * FROM fitnext.coach;").then((res) {
        var columnPrinted = false;
        for (var element in res) {
          for (var val in element.values) {
            if (!columnPrinted) {
              columnPrinted = true;
              for (var a in val.keys) {
                print(a);
              }
            }
            print(val);
          }
        }
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("test"),
      ),
      body: Center(
          child: ListView(children: [
        DataTable(
          columns: const [
            DataColumn(label: Text('ID')),
            DataColumn(label: Text('Name')),
            DataColumn(label: Text('Age')),
          ],
          rows: const [
            DataRow(
              cells: [
                DataCell(Text('1')),
                DataCell(Text('John')),
                DataCell(Text('20')),
              ],
            ),
            DataRow(
              cells: [
                DataCell(Text('2')),
                DataCell(Text('Robert')),
                DataCell(Text('25')),
              ],
            ),
          ],
        ),
        ElevatedButton(
          onPressed: () {
            Navigator.pop(context);
          },
          child: const Text('Go back!'),
        ),
      ])),
    );
  }
}

/// The base class for the different types of items the list can contain.
abstract class ListItem {
  /// The title line to show in a list item.
  Widget buildTitle(BuildContext context);

  /// The subtitle line, if any, to show in a list item.
  Widget buildSubtitle(BuildContext context);
}

/// A ListItem that contains data to display a heading.
class HeadingItem implements ListItem {
  final String heading;

  HeadingItem(this.heading);

  @override
  Widget buildTitle(BuildContext context) {
    return Text(
      heading,
      style: Theme.of(context).textTheme.headline5,
    );
  }

  @override
  Widget buildSubtitle(BuildContext context) => const SizedBox.shrink();
}

class _MyHomePageState extends State<MyHomePage> {
  int _counter = 0;
  PostgreSQLConnection connection = PostgreSQLConnection(
      "localhost", 5432, "bdr",
      username: "bdr", password: "bdr");
  List<ListItem> items = [];

  void _incrementCounter() {
    setState(() {
      _counter++;
    });
  }

  @override
  void initState() {
    super.initState();

    fetchTables = connection.open().then((val) => connection
            .mappedResultsQuery(
                "SELECT table_name FROM information_schema.tables WHERE table_schema = 'fitnext';")
            .then((res) {
          List<String> tableNames = [];

          // Get all table names
          for (var element in res) {
            for (var val in element.values) {
              tableNames.add(val["table_name"]);
            }
          }

          return tableNames;

          /*// Build UI items
          items = List<ListItem>.generate(
            1000,
            (i) => i % 6 == 0
                ? HeadingItem('Heading $i')
                : MessageItem('Sender $i', 'Message body $i'),
          );*/
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
                // Build UI items
                items = List<ListItem>.generate(
                  snapshot.data?.length as int,
                  (i) => HeadingItem('${snapshot.data?[i]}'),
                );

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
                    itemCount: items.length,
                    itemBuilder: (context, index) {
                      final item = items[index];

                      return ListTile(
                        title: item.buildTitle(context),
                        subtitle: item.buildSubtitle(context),
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
        ]

            /*
          [
            const DrawerHeader(
              decoration: BoxDecoration(
                color: Colors.blue,
              ),
              child: Text('Liste des tables dans la base de données'),
            ),
            ListView.builder(
              itemCount: items.length,
              itemBuilder: (context, index) {
                final item = items[index];

                return ListTile(
                  title: item.buildTitle(context),
                  subtitle: item.buildSubtitle(context),
                );
              },
            ),
            ListTile(
              title: const Text('Item 1'),
              onTap: () {
                Navigator.push(context, MaterialPageRoute(builder: (context) {
                  return MaterialApp(
                    home: const CRUDTable(tableName: 'coach'),
                  );
                }));
              },
            ),
            ListTile(
              title: const Text('Item 2'),
              onTap: () {
                // Update the state of the app
                // ...
                // Then close the drawer
                Navigator.pop(context);
              },
            ),
          ],*/

            ),
      ),
    );
  }
}
