
**4. Try to run the daemon /usr/local/bin/tinysvc as user test. Why it keeps dying?**

After deleting  lock file /var/local/TokenService.lock and installing Oracle Java I have launched that JAR.
In the application's source code there is a such condition where we will never wait for token 1234567890:

    ...
    for (int i = 1; i < 1010; i++) {
          java.nio.file.Path localPath = java.nio.file.Paths.get(String.format("/tmp/TokenService.tmp.%d", new Object[] { Integer.valueOf(i) }), new String[0]);
          localObject = java.nio.file.Files.newOutputStream(localPath, new java.nio.file.OpenOption[0]);
        }
        String str2 = System.getProperty("port");
        int j = Integer.parseInt(str2);
        Object localObject = HttpServer.create(new java.net.InetSocketAddress(j), 0);
        ((HttpServer)localObject).createContext("/get-token", new TokenService.MyHandler());
        ((HttpServer)localObject).setExecutor(null);
        ((HttpServer)localObject).start();
    ...

The code creates only up to 1009 http sockets.
