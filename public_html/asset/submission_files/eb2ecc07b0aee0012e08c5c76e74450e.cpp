#include <bits/stdc++.h>
using namespace std;
long long t,p,q,r,n,x,y,z,dist[1003][1003];
int main() {
	cin>>t;
	for(int cas=1;cas<=t;cas++){
		for(int i=1;i<=100;i++){
			for(int j=1;j<=100;j++){
				if(i==j)dist[i][j]=0;
				else dist[i][j]=1e9;
			}
		}
		cin>>n>>p>>q>>r;
		for(int i=1;i<=n;i++){
			cin>>x>>y>>z;
			dist[x][y]=min(dist[x][y],z);
			dist[y][x]=min(dist[y][x],z);
		}
	//	cout<<"ASU\n";
		for (int k = 1; k <= n; k++)
		 {
			  for (int i = 1; i <=n; i++)
			   {
				 for (int j = 1; j <= n; j++)
				 {
				      if (dist[i][k] + dist[k][j] < dist[i][j])
            				      dist[i][j] = dist[i][k] + dist[k][j];
				 }
			 }
		 }
		 if(dist[p][q]>r)cout<<"Andi tidak bisa mengikuti seminar.\n";
		 else cout<<dist[p][q]<<endl;
	}
}