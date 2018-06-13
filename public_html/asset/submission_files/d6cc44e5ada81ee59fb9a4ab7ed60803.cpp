#include<bits/stdc++.h>
using namespace std;

typedef pair<int,int> ii;
queue<ii> bfs;

int adax[500], aday[500];
int visited[500][500];

int n, m;

bool valid(int x, int y)
{
	if(x > 0 && x < n && y > 0 && y < m) return 1;
	else return 0;
}

int main()
{
	int t ; cin >> t;
	while(t--)
	{
		while(!bfs.empty()) bfs.pop();
		memset(visited, 0, sizeof visited);
		memset(adax, 0, sizeof adax);
		memset(aday, 0, sizeof aday);
		
		int  k; cin >> n >> m >> k;
		while(k--)
		{
			int x, y;
			cin >> x >> y;
			adax[x] = 1, aday[y] = 1;
		}
		int res = 0, mx = 0, mn = 1000000;
		
		for(int i = 1; i <= n-1; i++)
		{
			for(int j = 1; j <= m-1; j++)
			{
				if(!visited[i][j])
				{
					int cnt = 1;
					visited[i][j] = 1;
					bfs.push(ii(i,j));
					while(!bfs.empty())
					{
						ii curr = bfs.front(); bfs.pop();
						int x = curr.first, y = curr.second;
						//cout << valid(x+1,y) << "\n";
						if(valid(x+1,y) && !visited[x+1][y] && !adax[x+1])
						{
							cnt++;
							bfs.push(ii(x+1,y));
							visited[x+1][y] = 1;
						}
						if(valid(x-1,y) && !visited[x-1][y] && !adax[x])
						{
							cnt++;
							bfs.push(ii(x-1,y));
							visited[x-1][y] = 1;
						}
						if(valid(x,y+1) && !visited[x][y+1] && !aday[y+1])
						{
							cnt++;
							bfs.push(ii(x,y+1));
							visited[x][y+1] = 1;
						}
						if(valid(x,y-1) && !visited[x][y-1] && !aday[y])
						{
							cnt++;
							bfs.push(ii(x,y-1));
							visited[x][y-1] = 1;
						}
					}
				//	for(int i = 0; i <= n; i++)
				//	{
				//		for(int j = 0; j <= m; j++)
				//		cout << visited[i][j];
				//	//	cout << "\n";
				//	} 
				//	cout << "\n";
					res++;
					mx = max(cnt, mx);
					mn = min(cnt, mn);
				}
			}
		}
		cout << res << " " << mn << " " << mx << "\n";
	}
}
