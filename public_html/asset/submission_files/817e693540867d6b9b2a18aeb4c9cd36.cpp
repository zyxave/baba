#include<bits/stdc++.h>
#define ss second
#define ff first
using namespace std;
int t,n,d,r,x,y,a,bo[1000005],b;
pair<int,int> ans[1005];
char s[105][1005];
char u;
int process(int n)
{
	if(n==r) return 0;
	if(n/2>=r) return min(process(n/2)+y,process(n-1)+x);
	else return process(n-1)+x;
}
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d%d%d",&n,&d,&r);
		for(a=0;a<n;a++)
		{
			scanf("%s %s %d %d",&s[a],&u,&x,&y);bo[r]=0;bo[d]=0;	
			/*for(b=r+1;b<=d;b++)
			{
				bo[b]=bo[b-1]+x;
				bo[b]=min(bo[b],bo[b/2]+y);
			}*/
			//printf("%d %d %d %d\n",bo[100],bo[50],bo[25],bo[12]);
			ans[a].ff=process(d);
			ans[a].ss=a;
		}
		sort(ans,ans+n);
		for(a=0;a<n;a++)
		{
			printf("%s : %d\n",s[ans[a].ss],ans[a].ff);
		}
		if(t!=0) printf("\n");
	}
}
