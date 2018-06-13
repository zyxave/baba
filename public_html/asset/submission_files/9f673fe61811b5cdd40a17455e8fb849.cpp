#include<bits/stdc++.h>
#define f first
#define s second
using namespace std;
int t,n,tmp,y,z,a,ans;
pair < pair<int,int> , int> x[100004];
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);
		for(a=0;a<n;a++)
		{
			scanf("%d %d",&x[a].f.f,&x[a].f.s);x[a].s=1;
			if(x[a].f.f>x[a].f.s)
			{
				tmp=x[a].f.f;
				x[a].f.f=x[a].f.s;
				x[a].f.s=tmp;
				x[a].s=-1;
			}
		}
		sort(x,x+n);y=0;z=0;
		if(x[0].s==-1) z++;
		else y++;
		ans=0;
		for(a=1;a<n;a++)
		{
			//printf("%d %d\n",y,z);
			if(x[a].f.f==x[a-1].f.f && x[a-1].f.s==x[a].f.s)
			{
				if(x[a].s==-1) z++;
				else y++;
			}
			else
			{
				int h=min(z,y);
				//printf("%d\n",h);
				ans+=h*2;
				
				z=0;
				y=0;
				if(x[a].s==-1) z=1;
				else y=1;
			}
		}
		ans+=(y,z)*2;
		printf("%d\n",ans);
	}
}
