#include<bits/stdc++.h>
using namespace std;
long long t,n,m,ans[100][100],a,b;
int main()
{
	scanf("%lld",&t);
	while(t--)
	{
		scanf("%lld%lld",&n,&m);ans[2][0]=n*n;ans[2][1]=n+n;ans[2][2]=1;
		if(m==1)
		{
			printf("x %lld\n",n);
		}
		else{
		for(a=3;a<=m;a++)
		{
			ans[a][0]=ans[a-1][0]*n;
			for(b=1;b<=a;b++)
			{
				if(b==a) ans[a][b]=1;
				else ans[a][b]=ans[a-1][b-1]+ans[a-1][b]*n;
			}
		}
		/*for(a=2;a<=m;a++)
		{
			for(b=1;b<=a;b++)
			{
				printf("%d ",ans[a][b]);
			}cout<<endl;
		}*/
		for(a=1;a<=m;a++)
		{
			if(a>1) printf(" ");
			if(ans[m][m-a+1]>1) printf("%lld",ans[m][m-a+1]);
			printf("x");
			if(m-a+1>1) printf("%lld",m-a+1);
			//printf("%dx%d",ans[m][m-a+1],m-a+1);
		}
		printf(" %lld",ans[m][0]);
		printf("\n");}
	}
}
