#include<bits/stdc++.h>
using namespace std;
int balik(int x)
{
	int y;
	while(x>0)
	{
		y=y*10+x%10;
		x/=10;
	}
	return y;
}
int nn;
int rec(int n)
{
	if(n==nn) return 1;
	int y=balik(n);
	//printf("%d\n",n);
	if(y>n && y<=nn)
	return min(rec(y),rec(n+1))+1;
	else return rec(n+1)+1;
}
int t,a,ans,y;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&nn);
		ans=rec(1);
		printf("%d\n",ans);
	}
}
