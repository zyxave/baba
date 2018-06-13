#include<bits/stdc++.h>
using namespace std;

int t,a[101][101],n,m,i,j,ans,maks;

void dfs(int x,int y)
{
	if(a[x][y]!=1) return;
	a[x][y]=0;
	ans++;
	dfs(x+1,y);
	dfs(x-1,y);
	dfs(x,y+1);
	dfs(x,y-1);
	dfs(x+1,y+1);
	dfs(x+1,y-1);
	dfs(x-1,y+1);
	dfs(x-1,y-1);
}

int main ()
{
	cin>>t;
	while(t--)
	{
		maks=0;
		cin>>n>>m;
		for(int i=1;i<=n;i++)
		{
			for(int j=1;j<=m;j++)
			{
				cin>>a[i][j];
			}
		}
		for(int i=1;i<=n;i++)
		{
			for(int j=1;j<=m;j++)
			{
				ans=0;
				dfs(i,j);
				if(ans>maks) maks=ans;
			}
		}
		cout<<maks<<endl;
	}
}
