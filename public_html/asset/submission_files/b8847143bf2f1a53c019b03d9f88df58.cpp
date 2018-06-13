#include<bits/stdc++.h>
#define f first
#define s second
#define mp make_pair
using namespace std;

int tc,n,m;
int arr[15][15];
bool cek[15][15];
int arah1[] = {0,0,1,1,1,-1,-1,-1};
int arah2[] = {1,-1,1,0,-1,1,0,-1};
queue<pair<int,int> >q;

int ans;
int temp;
void dfs()
{
	while(!q.empty())
	{
		int i = q.front().f;
		int j = q.front().s;
		q.pop();
		cek[i][j] = true;
		
		for(int x = 0 ; x < 8 ; x++)
		{
			int u = i + arah1[x];
			int v = j + arah2[x];
			if(cek[u][v] == false && arr[u][v] == 1 && u >= 0 && v >= 0 && u < n && v < m)  
			{
				temp++;
				cek[u][v] = true;
				q.push(mp(u,v));
			}
		}
	}
}

int main()
{
	cin >> tc;
	while(tc--)
	{
		ans = 0;
		memset(cek,false,sizeof cek);
		
		cin >> n >> m;
		for(int x = 0 ; x < n ; x++)
		{
			for(int y = 0 ; y < m ; y ++)
			{
				cin >> arr[x][y];
			}
		}
		
		for(int x = 0 ; x < n ; x++)
		{
			for(int y = 0 ; y < m ; y ++)
			{
				if(cek[x][y] == false && arr[x][y] == 1)
				{
					temp = 1;
					q.push(mp(x,y));
					dfs();
					ans = max(ans,temp);
				}
			}
		}
		printf("%d\n",ans);
	}
}
