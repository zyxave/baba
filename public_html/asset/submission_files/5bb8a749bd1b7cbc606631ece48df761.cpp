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
queue<int> q;
int t,a,ans,y,nn,bo[10000005],p;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&nn);while(q.empty()==false) q.pop();memset(bo,0,sizeof(bo));
		q.push(1);bo[1]=1;
		while(q.empty()==false && q.front()!=nn)
		{
			p=q.front();
			y=balik(p);
			printf("",p);
			if(bo[p+1]==0)
			{bo[p+1]=bo[p]+1;q.push(p+1);}
			if(bo[y]==0 && y<=nn)
			{bo[y]=bo[p]+1;q.push(y);}
			q.pop();
		}
		printf("%d\n",bo[nn]);
	}
}
